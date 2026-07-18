@extends('layouts.cliente')

@section('title', 'Reservar Habitación')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4>

            <i class="bi bi-search"></i>

            Buscar Habitaciones Disponibles

        </h4>

    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('cliente.reservar.store') }}">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label class="form-label">

                        Fecha ingreso

                    </label>

                    <input
                        type="date"
                        name="fecha_ingreso"
                        class="form-control"
                        value="{{ old('fecha_ingreso', $datos['fecha_ingreso'] ?? '') }}"
                        required
                    >

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Fecha salida

                    </label>

                    <input
                        type="date"
                        name="fecha_salida"
                        class="form-control"
                        value="{{ old('fecha_salida', $datos['fecha_salida'] ?? '') }}"
                        required
                    >

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Personas

                    </label>

                    <input
                        type="number"
                        name="cantidad_personas"
                        min="1"
                        class="form-control"
                        value="{{ old('cantidad_personas', $datos['cantidad_personas'] ?? '') }}"
                        required
                    >

                </div>

            </div>

            <div class="mt-4">

                <button class="btn btn-primary">

                    <i class="bi bi-search me-2"></i>

                    Buscar Disponibilidad

                </button>

            </div>

        </form>

    </div>

</div>

@if(isset($habitaciones))

    <hr class="my-5">

    <h3 class="mb-4">

        Habitaciones disponibles

    </h3>

    @if($habitaciones->count())

        <div class="row">

            @foreach($habitaciones as $habitacion)

                <div class="col-md-4 mb-4">

                    <div class="card shadow h-100">

                        <div class="card-body">

                            <h4 class="card-title">

                                Habitación {{ $habitacion->numero }}

                            </h4>

                            <hr>

                            <p>

                                <strong>Tipo:</strong>

                                {{ $habitacion->tipo }}

                            </p>

                            <p>

                                <strong>Precio por noche:</strong>

                                ${{ number_format($habitacion->precio_noche, 0, ',', '.') }}

                            </p>

                            @if(isset($habitacion->capacidad))

                                <p>

                                    <strong>Capacidad:</strong>

                                    {{ $habitacion->capacidad }} personas

                                </p>

                            @endif

                            <p>

                                <span class="badge bg-success">

                                    Disponible

                                </span>

                            </p>

                            <form method="POST"
                                  action="{{ route('cliente.reservar.confirmar') }}">

                                @csrf

                                <input type="hidden"
                                       name="habitacion_id"
                                       value="{{ $habitacion->id }}">

                                <input type="hidden"
                                       name="fecha_ingreso"
                                       value="{{ $datos['fecha_ingreso'] }}">

                                <input type="hidden"
                                       name="fecha_salida"
                                       value="{{ $datos['fecha_salida'] }}">

                                <input type="hidden"
                                       name="cantidad_personas"
                                       value="{{ $datos['cantidad_personas'] }}">

                                <button class="btn btn-primary w-100">

                                    <i class="bi bi-calendar-check me-2"></i>

                                    Reservar esta habitación

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-warning">

            <i class="bi bi-exclamation-triangle me-2"></i>

            No hay habitaciones disponibles para las fechas seleccionadas.

        </div>

    @endif

@endif

@endsection