<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Huesped;
use App\Models\Reserva;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas de habitaciones
        $habitaciones   = Habitacion::count();
        $disponibles    = Habitacion::where('estado', 'Disponible')->count();
        $ocupadas       = Habitacion::where('estado', 'Ocupada')->count();
        $reservadas     = Habitacion::where('estado', 'Reservada')->count();
        $mantenimiento  = Habitacion::where('estado', 'Mantenimiento')->count();

        // Estadísticas generales
        $huespedes = Huesped::count();
        $reservas  = Reserva::count();

        return view('dashboard.index', compact(
            'habitaciones',
            'huespedes',
            'reservas',
            'disponibles',
            'ocupadas',
            'reservadas',
            'mantenimiento'
        ));
    }
}
