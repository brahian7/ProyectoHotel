<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'usuario_id',
        'huesped_id',
        'habitacion_id',
        'fecha_reserva',
        'fecha_ingreso',
        'fecha_salida',
        'cantidad_personas',
        'estado',
        'observaciones'
    ];

    protected function casts(): array
    {
        return [
            'fecha_reserva' => 'date',
            'fecha_ingreso' => 'date',
            'fecha_salida' => 'date',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function huesped()
    {
        return $this->belongsTo(Huesped::class, 'huesped_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}