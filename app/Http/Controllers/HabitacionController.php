<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
   /**
 * Mostrar listado de habitaciones.
 */
public function index(Request $request)
{
    $buscar = $request->buscar;

    $habitaciones = Habitacion::query()

        ->when($buscar, function ($query) use ($buscar) {

            $query->where('numero', 'like', "%{$buscar}%")
                  ->orWhere('tipo', 'like', "%{$buscar}%");

        })

        ->orderBy('numero')

        ->paginate(10)

        ->withQueryString();

    return view('habitaciones.index', compact('habitaciones', 'buscar'));
}

    /**
     * Mostrar formulario para crear.
     */
    public function create()
    {
        return view('habitaciones.create');
    }

    /**
     * Guardar habitación.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([

            'numero' => 'required|max:10|unique:habitaciones',

            'tipo' => 'required',

            'capacidad' => 'required|integer|min:1',

            'precio_noche' => 'required|numeric|min:0',

            'estado' => 'required',

            'descripcion' => 'nullable',

            'imagen' => 'nullable|string'

        ]);

        Habitacion::create($datos);

        return redirect()
                ->route('habitaciones.index')
                ->with('success', 'Habitación creada correctamente.');
    }

    /**
     * Mostrar una habitación.
     */
    public function show(Habitacion $habitacion)
    {
        return view('habitaciones.show', compact('habitacion'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(Habitacion $habitacion)
    {
        return view('habitaciones.edit', compact('habitacion'));
    }

    /**
     * Actualizar habitación.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        $datos = $request->validate([

            'numero' => 'required|max:10|unique:habitaciones,numero,' . $habitacion->id,

            'tipo' => 'required',

            'capacidad' => 'required|integer|min:1',

            'precio_noche' => 'required|numeric|min:0',

            'estado' => 'required',

            'descripcion' => 'nullable',

            'imagen' => 'nullable|string'

        ]);

        $habitacion->update($datos);

        return redirect()
                ->route('habitaciones.index')
                ->with('success', 'Habitación actualizada correctamente.');
    }

    /**
     * Eliminar habitación.
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();

        return redirect()
                ->route('habitaciones.index')
                ->with('success', 'Habitación eliminada correctamente.');
    }
}