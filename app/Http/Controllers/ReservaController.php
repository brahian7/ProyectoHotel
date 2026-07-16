<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Huesped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservaController extends Controller
{
    /**
     * Mostrar listado de reservas.
     */
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $reservas = Reserva::with(['huesped', 'habitacion'])

        ->when($buscar, function ($query) use ($buscar) {

            $query->whereHas('huesped', function ($q) use ($buscar) {

                $q->where('nombres', 'like', "%{$buscar}%")
                  ->orWhere('apellidos', 'like', "%{$buscar}%")
                  ->orWhere('numero_documento', 'like', "%{$buscar}%");

            })

            ->orWhereHas('habitacion', function ($q) use ($buscar) {

                $q->where('numero', 'like', "%{$buscar}%");

            });

        })

        ->orderByDesc('fecha_reserva')

        ->paginate(10);

    return view('reservas.index', compact('reservas', 'buscar'));
}

    /**
     * Mostrar formulario para crear.
     */
        public function create()
    {
        $huespedes = Huesped::orderBy('nombres')->get();

        $habitaciones = Habitacion::where('estado', 'Disponible')
                                    ->orderBy('numero')
                                    ->get();

        return view('reservas.create', compact(
            'huespedes',
            'habitaciones'
        ));
    }

    /**
     * Guardar reserva.
     */
    public function store(Request $request)
{
    $datos = $request->validate([

        'huesped_id' => 'required|exists:huespedes,id',

        'habitacion_id' => 'required|exists:habitaciones,id',

        'fecha_reserva' => 'required|date',

        'fecha_ingreso' => 'required|date|after_or_equal:today',

        'fecha_salida' => 'required|date|after:fecha_ingreso',

        'cantidad_personas' => 'required|integer|min:1',

        'estado' => 'required',

        'observaciones' => 'nullable|string'

    ]);

    // Verificar que la habitación no esté ocupada en esas fechas
    $ocupada = Reserva::where('habitacion_id', $datos['habitacion_id'])

        ->whereNotIn('estado', ['Cancelada', 'Finalizada'])

        ->where(function ($query) use ($datos) {

            $query->whereBetween('fecha_ingreso', [
                $datos['fecha_ingreso'],
                $datos['fecha_salida']
            ])

            ->orWhereBetween('fecha_salida', [
                $datos['fecha_ingreso'],
                $datos['fecha_salida']
            ])

            ->orWhere(function ($q) use ($datos) {

                $q->where('fecha_ingreso', '<=', $datos['fecha_ingreso'])

                  ->where('fecha_salida', '>=', $datos['fecha_salida']);

            });

        })

        ->exists();

    if ($ocupada) {

        return back()
            ->withInput()
            ->with('error', 'La habitación ya está reservada para esas fechas.');

    }

    // Usuario autenticado
    $datos['usuario_id'] = Auth::id();

    // Obtener la habitación
    $habitacion = Habitacion::findOrFail($datos['habitacion_id']);

    // Generar código de reserva
    $ultimoId = (Reserva::max('id') ?? 0) + 1;

    $datos['codigo_reserva'] = 'RES-' . str_pad($ultimoId, 6, '0', STR_PAD_LEFT);

    // Calcular cantidad de noches
    $datos['cantidad_noches'] = Carbon::parse($datos['fecha_ingreso'])
        ->diffInDays(Carbon::parse($datos['fecha_salida']));

    // Guardar el precio de la habitación al momento de reservar
    $datos['precio_noche'] = $habitacion->precio_noche;

    // Calcular el total
    $datos['total'] = $datos['cantidad_noches'] * $habitacion->precio_noche;

    // Crear reserva
    Reserva::create($datos);

    // Cambiar estado de la habitación
    $habitacion->update([
        'estado' => 'Reservada'
    ]);

    return redirect()
        ->route('reservas.index')
        ->with('success', 'Reserva registrada correctamente.');
}

    /**
     * Mostrar una reserva.
     */
        public function show(Reserva $reserva)
    {
        $reserva->load([
            'huesped',
            'habitacion',
            'usuario'
        ]);

        return view('reservas.show', compact('reserva'));
    }

     /**
     * Mostrar formulario para editar.
     */
    public function edit(Reserva $reserva)
{
    $huespedes = Huesped::orderBy('nombres')->get();

    $habitaciones = Habitacion::orderBy('numero')->get();

    return view('reservas.edit', compact(
        'reserva',
        'huespedes',
        'habitaciones'
    ));
}

    
    /**
     * Actualizar reserva.
     */
    public function update(Request $request, Reserva $reserva)
{
    $datos = $request->validate([

        'huesped_id' => 'required|exists:huespedes,id',

        'habitacion_id' => 'required|exists:habitaciones,id',

        'fecha_reserva' => 'required|date',

        'fecha_ingreso' => 'required|date',

        'fecha_salida' => 'required|date|after:fecha_ingreso',

        'cantidad_personas' => 'required|integer|min:1',

        'estado' => 'required',

        'observaciones' => 'nullable|string'

    ]);

    $ocupada = Reserva::where('habitacion_id', $datos['habitacion_id'])

        ->where('id', '!=', $reserva->id)

        ->whereNotIn('estado', ['Cancelada', 'Finalizada'])

        ->where(function ($query) use ($datos) {

            $query->whereBetween('fecha_ingreso', [
                $datos['fecha_ingreso'],
                $datos['fecha_salida']
            ])

            ->orWhereBetween('fecha_salida', [
                $datos['fecha_ingreso'],
                $datos['fecha_salida']
            ])

            ->orWhere(function ($q) use ($datos) {

                $q->where('fecha_ingreso', '<=', $datos['fecha_ingreso'])

                  ->where('fecha_salida', '>=', $datos['fecha_salida']);

            });

        })

        ->exists();

    if ($ocupada) {

        return back()

            ->withInput()

            ->with('error', 'La habitación ya está reservada para esas fechas.');

    }

    if ($reserva->habitacion_id != $datos['habitacion_id']) {

        Habitacion::find($reserva->habitacion_id)
            ?->update([
                'estado' => 'Disponible'
            ]);

        Habitacion::find($datos['habitacion_id'])
            ?->update([
                'estado' => 'Reservada'
            ]);
    }

    $reserva->update($datos);

    return redirect()

        ->route('reservas.index')

        ->with('success', 'Reserva actualizada correctamente.');
}

    /**
     * Eliminar reserva.
     */
        public function destroy(Reserva $reserva)
    {
        try {

            $habitacion = $reserva->habitacion;

            $reserva->delete();

            if ($habitacion) {

                $tieneReservas = Reserva::where('habitacion_id', $habitacion->id)

                    ->whereNotIn('estado', ['Cancelada', 'Finalizada'])

                    ->exists();

                if (!$tieneReservas) {

                    $habitacion->update([

                        'estado' => 'Disponible'

                    ]);

                }

            }

            return redirect()

                ->route('reservas.index')

                ->with('success', 'Reserva eliminada correctamente.');

        } catch (\Exception $e) {

            return redirect()

                ->route('reservas.index')

                ->with('error', 'No se pudo eliminar la reserva.');

        }
    }
}