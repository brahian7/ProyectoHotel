<?php

namespace App\Http\Controllers;

use App\Models\Huesped;
use Illuminate\Http\Request;

class HuespedController extends Controller
{
    /**
 * Mostrar listado de huéspedes.
 */
public function index(Request $request)
{
    $buscar = $request->buscar;

    $huespedes = Huesped::when($buscar, function ($query) use ($buscar) {

        $query->where('nombres', 'like', "%{$buscar}%")
              ->orWhere('apellidos', 'like', "%{$buscar}%")
              ->orWhere('numero_documento', 'like', "%{$buscar}%");

    })
    ->orderBy('nombres')
    ->paginate(10);

    return view('huespedes.index', compact('huespedes', 'buscar'));
}

        /**
     * Mostrar formulario para crear un huésped.
     */
        public function create()
        {
            return view('huespedes.create');
        }

        /**
     * Guardar huésped.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([

        'tipo_documento' => 'required|max:20',

        'numero_documento' => 'required|max:20|unique:huespedes',

        'nombres' => 'required|max:100',

        'apellidos' => 'required|max:100',

        'telefono' => 'required|max:20',

        'correo' => 'nullable|email',

        'direccion' => 'nullable|max:255',

        'ciudad' => 'nullable|max:100',

        'fecha_registro' => 'required|date',

    ]);

    Huesped::create($datos);

    return redirect()
            ->route('huespedes.index')
            ->with('success', 'Huésped registrado correctamente.');
}

        /**
     * Mostrar un huésped.
     */
            public function show($id)
    {
        $huesped = Huesped::findOrFail($id);

        return view('huespedes.show', compact('huesped'));
    }

        /**
     * Mostrar formulario para editar.
     */
        public function edit($id)
    {
        $huesped = Huesped::findOrFail($id);

        return view('huespedes.edit', compact('huesped'));
    }

        /**
     * Actualizar huésped.
     */
        public function update(Request $request, $id)
    {
        $huesped = Huesped::findOrFail($id);

        $datos = $request->validate([

            'tipo_documento' => 'required|max:20',

            'numero_documento' => 'required|max:20|unique:huespedes,numero_documento,' . $huesped->id,

            'nombres' => 'required|max:100',

            'apellidos' => 'required|max:100',

            'telefono' => 'required|max:20',

            'correo' => 'nullable|email',

            'direccion' => 'nullable|max:255',

            'ciudad' => 'nullable|max:100',

            'fecha_registro' => 'required|date',

        ]);

        $huesped->update($datos);

        return redirect()
                ->route('huespedes.index')
                ->with('success', 'Huésped actualizado correctamente.');
    }
        /**
     * Eliminar huésped.
     */
        public function destroy($id)
    {
        try {

            $huesped = Huesped::findOrFail($id);

            $huesped->delete();

            return redirect()
                    ->route('huespedes.index')
                    ->with('success', 'Huésped eliminado correctamente.');

        } catch (\Exception $e) {

            return redirect()
                    ->route('huespedes.index')
                    ->with('error', 'No se puede eliminar este huésped porque tiene registros asociados.');

        }
    }
}
