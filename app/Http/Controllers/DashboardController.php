<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Habitacion;
use App\Models\Huesped;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Dashboard del Cliente
        |--------------------------------------------------------------------------
        */

        if (Auth::user()->rol === 'Cliente') {

            return view('dashboard.cliente');

        }

        /*
        |--------------------------------------------------------------------------
        | Dashboard Administrativo
        |--------------------------------------------------------------------------
        */

        $usuarios = User::count();

        $habitaciones = Habitacion::count();

        $huespedes = Huesped::count();

        $reservas = Reserva::count();

        /*
        |--------------------------------------------------------------------------
        | Estado de habitaciones
        |--------------------------------------------------------------------------
        */

        $disponibles = Habitacion::where('estado', 'Disponible')->count();

        $ocupadas = Habitacion::where('estado', 'Ocupada')->count();

        $reservadas = Habitacion::where('estado', 'Reservada')->count();

        $mantenimiento = Habitacion::where('estado', 'Mantenimiento')->count();

        /*
        |--------------------------------------------------------------------------
        | Ingresos
        |--------------------------------------------------------------------------
        */

        $ingresos = Reserva::sum('total');

        /*
        |--------------------------------------------------------------------------
        | Ocupación
        |--------------------------------------------------------------------------
        */

        if ($habitaciones > 0) {

            $ocupacion = round((($ocupadas + $reservadas) / $habitaciones) * 100);

        } else {

            $ocupacion = 0;

        }

        /*
        |--------------------------------------------------------------------------
        | Reservas del mes
        |--------------------------------------------------------------------------
        */

        $reservasMes = Reserva::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Últimas reservas
        |--------------------------------------------------------------------------
        */

        $ultimasReservas = Reserva::with([
                'huesped',
                'habitacion'
            ])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'usuarios',
            'habitaciones',
            'huespedes',
            'reservas',
            'disponibles',
            'ocupadas',
            'reservadas',
            'mantenimiento',
            'ingresos',
            'ocupacion',
            'reservasMes',
            'ultimasReservas'
        ));
    }
}