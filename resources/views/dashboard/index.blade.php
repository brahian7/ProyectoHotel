@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Bienvenida --}}
    <div class="row mb-4">

        <div class="col-lg-8">

            <h2 class="fw-bold">

                👋 Bienvenido,
                {{ Auth::user()->name ?? Auth::user()->nombre }}

            </h2>

            <p class="text-muted mb-0">

                Panel administrativo del

                <strong>Hotel Central La Italia</strong>

            </p>

        </div>

        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted mb-1">

                        Fecha actual

                    </h6>

                    <h5 class="mb-0">

                        {{ now()->format('d/m/Y') }}

                    </h5>

                </div>

            </div>

        </div>

    </div>

    {{-- Tarjetas --}}
    <div class="row g-4 mb-5">

        <div class="col-lg-3 col-md-6"
             data-aos="fade-up"
             data-aos-delay="100">

            <a href="{{ route('habitaciones.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-door-open-fill text-primary"
                           style="font-size:55px;"></i>

                        <h2 class="mt-3 contador"
                            data-target="{{ $habitaciones }}">

                            0

                        </h2>

                        <p class="text-muted mb-0">

                            Habitaciones

                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-lg-3 col-md-6"
             data-aos="fade-up"
             data-aos-delay="200">

            <a href="{{ route('huespedes.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-people-fill text-success"
                           style="font-size:55px;"></i>

                        <h2 class="mt-3 contador"
                            data-target="{{ $huespedes }}">

                            0

                        </h2>

                        <p class="text-muted mb-0">

                            Huéspedes

                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-lg-3 col-md-6"
             data-aos="fade-up"
             data-aos-delay="300">

            <a href="{{ route('reservas.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-calendar-check-fill text-warning"
                           style="font-size:55px;"></i>

                        <h2 class="mt-3 contador"
                            data-target="{{ $reservas }}">

                            0

                        </h2>

                        <p class="text-muted mb-0">

                            Reservas

                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-lg-3 col-md-6"
             data-aos="fade-up"
             data-aos-delay="400">

            <a href="{{ route('habitaciones.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-check-circle-fill text-info"
                           style="font-size:55px;"></i>

                        <h2 class="mt-3 contador"
                            data-target="{{ $disponibles }}">

                            0

                        </h2>

                        <p class="text-muted mb-0">

                            Disponibles

                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

    {{-- Gráfico e indicadores --}}
    <div class="row mb-5">

        <div class="col-lg-8">

            <div class="card border-0 shadow">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-pie-chart-fill me-2"></i>

                        Estado de las Habitaciones

                    </h5>

                </div>

                <div class="card-body">

                 <canvas
                    id="graficoHabitaciones"
                    height="120"

                    data-disponibles="{{ $disponibles }}"
                    data-ocupadas="{{ $ocupadas }}"
                    data-reservadas="{{ $reservadas }}"
                    data-mantenimiento="{{ $mantenimiento }}">

                </canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow h-100">

                <div class="card-header bg-secondary text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-clipboard-data-fill me-2"></i>

                        Resumen General

                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span>🟢 Disponibles</span>

                        <strong>{{ $disponibles }}</strong>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>🔴 Ocupadas</span>

                        <strong>{{ $ocupadas }}</strong>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>🟡 Reservadas</span>

                        <strong>{{ $reservadas }}</strong>

                    </div>

                    <div class="d-flex justify-content-between">

                        <span>⚫ Mantenimiento</span>

                        <strong>{{ $mantenimiento }}</strong>

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- Accesos rápidos --}}
    <div class="row">

        <div class="col-lg-8">

            <div class="card border-0 shadow">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-lightning-charge-fill me-2"></i>

                        Accesos rápidos

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">

                            <a href="{{ route('habitaciones.index') }}"
                               class="btn btn-outline-primary w-100 py-3">

                                <i class="bi bi-door-open-fill fs-3 d-block mb-2"></i>

                                Habitaciones

                            </a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('huespedes.index') }}"
                               class="btn btn-outline-success w-100 py-3">

                                <i class="bi bi-people-fill fs-3 d-block mb-2"></i>

                                Huéspedes

                            </a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('reservas.index') }}"
                               class="btn btn-outline-warning w-100 py-3">

                                <i class="bi bi-calendar-check-fill fs-3 d-block mb-2"></i>

                                Reservas

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Información del sistema --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow h-100">

                <div class="card-header bg-dark text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-info-circle-fill me-2"></i>

                        Información del Sistema

                    </h5>

                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <h6 class="fw-bold">

                            🏨 Hotel Central La Italia

                        </h6>

                        <small class="text-muted">

                            Sistema Administrativo Hotelero

                        </small>

                    </div>

                    <hr>

                    <p class="mb-2">

                        <i class="bi bi-code-slash text-primary me-2"></i>

                        Laravel 13

                    </p>

                    <p class="mb-2">

                        <i class="bi bi-bootstrap-fill text-purple me-2"></i>

                        Bootstrap 5

                    </p>

                    <p class="mb-2">

                        <i class="bi bi-pie-chart-fill text-success me-2"></i>

                        Chart.js

                    </p>

                    <p class="mb-2">

                        <i class="bi bi-bell-fill text-warning me-2"></i>

                        SweetAlert2

                    </p>

                    <p class="mb-2">

                        <i class="bi bi-stars text-info me-2"></i>

                        AOS Animations

                    </p>

                    <hr>

                    <div class="text-center">

                        <small class="text-muted">

                            © {{ date('Y') }}

                        </small>

                        <br>

                        <strong>

                            Hotel Central La Italia

                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection