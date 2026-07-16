@extends('layouts.admin')

@section('title','Reservas')

@section('content')

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                <i class="bi bi-calendar-check-fill text-primary"></i>

                Gestión de Reservas

            </h2>

            <p class="text-muted mb-0">

                Administre las reservas del hotel.

            </p>

        </div>

        <a href="{{ route('reservas.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle-fill"></i>

            Nueva Reserva

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-header bg-white">

            <form method="GET">

                <div class="row">

                    <div class="col-md-6">

                        <input
                            type="text"
                            name="buscar"
                            class="form-control"
                            placeholder="Buscar huésped o habitación..."
                            value="{{ $buscar }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            <i class="bi bi-search"></i>

                            Buscar

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Huésped</th>

                        <th>Habitación</th>

                        <th>Ingreso</th>

                        <th>Salida</th>

                        <th>Noches</th>

                        <th>Total</th>

                        <th>Estado</th>

                        <th width="180">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($reservas as $reserva)

                    <tr>

                        <td>

                            {{ $reserva->id }}

                        </td>

                        <td>

                            <strong>

                                {{ $reserva->huesped->nombres }}

                                {{ $reserva->huesped->apellidos }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $reserva->huesped->numero_documento }}

                            </small>

                        </td>

                        <td>

                            <strong>

                                Hab. {{ $reserva->habitacion->numero }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $reserva->habitacion->tipo }}

                            </small>

                        </td>

                        <td>

                            {{ $reserva->fecha_ingreso->format('d/m/Y') }}

                        </td>

                        <td>

                            {{ $reserva->fecha_salida->format('d/m/Y') }}

                        </td>

                        <td>

                            {{ $reserva->fecha_ingreso->diffInDays($reserva->fecha_salida) }}

                        </td>

                        <td class="fw-bold text-success">

                            $

                            {{ number_format(
                                $reserva->habitacion->precio_noche *
                                $reserva->fecha_ingreso->diffInDays($reserva->fecha_salida),
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>

                        <td>
                                                @switch($reserva->estado)

                            @case('Pendiente')

                                <span class="badge bg-warning text-dark">

                                    Pendiente

                                </span>

                            @break

                            @case('Confirmada')

                                <span class="badge bg-success">

                                    Confirmada

                                </span>

                            @break

                            @case('Cancelada')

                                <span class="badge bg-danger">

                                    Cancelada

                                </span>

                            @break

                            @case('Finalizada')

                                <span class="badge bg-secondary">

                                    Finalizada

                                </span>

                            @break

                        @endswitch

                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                <a href="{{ route('reservas.show',$reserva) }}"
                                   class="btn btn-sm btn-info text-white"
                                   title="Ver">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                <a href="{{ route('reservas.edit',$reserva) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Editar">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('reservas.destroy',$reserva) }}"
                                    method="POST"
                                    class="formulario-eliminar">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center py-5">

                            <i class="bi bi-calendar-x display-4 text-muted"></i>

                            <br><br>

                            <h5 class="text-muted">

                                No hay reservas registradas.

                            </h5>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        @if($reservas->hasPages())

            <div class="card-footer bg-white">

                {{ $reservas->links() }}

            </div>

        @endif

    </div>

</div>

@endsection