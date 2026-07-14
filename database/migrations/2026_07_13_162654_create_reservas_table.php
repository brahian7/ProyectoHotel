<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {

    $table->id();

    $table->foreignId('usuario_id')
      ->constrained('users')
      ->cascadeOnDelete();

    $table->foreignId('huesped_id')
      ->constrained('huespedes')
      ->cascadeOnDelete();

    $table->foreignId('habitacion_id')
      ->constrained('habitaciones')
      ->cascadeOnDelete();

    $table->date('fecha_reserva');

    $table->date('fecha_ingreso');

    $table->date('fecha_salida');

    $table->integer('cantidad_personas');

    $table->enum('estado',[
        'Pendiente',
        'Confirmada',
        'Cancelada',
        'Finalizada'
    ]);

    $table->text('observaciones')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
