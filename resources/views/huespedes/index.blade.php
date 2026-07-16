@extends('layouts.admin')

@section('title', 'Huéspedes')

@section('content')

<div class="container-fluid mt-4">

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                <i class="bi bi-people-fill text-primary"></i>
                Gestión de Huéspedes
            </h2>

            <p class="text-muted mb-0">
                Administra la información de los huéspedes registrados.
            </p>

        </div>

        <a href="{{ route('huespedes.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Nuevo Huésped

        </a>

    </div>

    {{-- Buscador --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('huespedes.index') }}">

                <div class="row">

                    <div class="col-md-5">

                        <input
                            type="text"
                            name="buscar"
                            class="form-control"
                            placeholder="Buscar por nombre o documento..."
                            value="{{ $buscar }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-dark w-100">

                            <i class="bi bi-search"></i>

                            Buscar

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Tabla --}}
    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>Documento</th>

                            <th>Nombre Completo</th>

                            <th>Teléfono</th>

                            <th>Correo</th>

                            <th>Ciudad</th>

                            <th width="180">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                                            @forelse($huespedes as $huesped)

                        <tr>

                            <td>

                                <strong>{{ $huesped->numero_documento }}</strong>

                            </td>

                            <td>

                                {{ $huesped->nombres }}
                                {{ $huesped->apellidos }}

                            </td>

                            <td>

                                {{ $huesped->telefono }}

                            </td>

                            <td>

                                {{ $huesped->correo ?? 'No registrado' }}

                            </td>

                            <td>

                                {{ $huesped->ciudad ?? 'No registrada' }}

                            </td>

                            <td>

                                <a href="{{ route('huespedes.show', $huesped) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                <a href="{{ route('huespedes.edit', $huesped) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('huespedes.destroy', $huesped) }}"
                                    method="POST"
                                    class="d-inline formulario-eliminar">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center text-muted py-4">

                                <i class="bi bi-person-x-fill fs-2"></i>

                                <br><br>

                                No existen huéspedes registrados.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $huespedes->links() }}

            </div>

        </div>

    </div>

</div>

@endsection