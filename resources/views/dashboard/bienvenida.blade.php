@php

    use Carbon\Carbon;

    Carbon::setLocale('es');

    $hora = now()->hour;

    if ($hora >= 5 && $hora < 12) {

        $saludo = '☀ Buenos días';

    } elseif ($hora >= 12 && $hora < 18) {

        $saludo = '🌤 Buenas tardes';

    } else {

        $saludo = '🌙 Buenas noches';

    }

@endphp

<div class="card border-0 shadow-lg overflow-hidden mb-5"
     data-aos="fade-down"
     style="background: linear-gradient(135deg,#0d6efd,#4f8dfd); border-radius:22px;">

    <div class="card-body p-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="fw-bold text-white mb-3">

                    {{ $saludo }}, {{ Auth::user()->nombre }}

                </h2>

                <h5 class="text-white opacity-75 mb-4">

                    Bienvenido nuevamente al Sistema de Gestión Hotelera

                </h5>

                <h3 class="fw-bold text-white">

                    Hotel Central La Italia

                </h3>

                <p class="text-white opacity-75 mb-0">

                    Cartago, Valle del Cauca

                </p>

            </div>

            <div class="col-lg-4">

                <div class="bg-white rounded-4 shadow p-4">

                    <h5 class="fw-bold text-primary mb-3">

                        <i class="bi bi-building-fill me-2"></i>

                        HOTEL

                    </h5>

                    <hr>

                    <p class="mb-2">

                        <strong>Usuario:</strong><br>

                        {{ Auth::user()->nombre }}

                    </p>

                    <p class="mb-2">

                        <strong>Fecha:</strong><br>

                        {{ ucfirst(now()->translatedFormat('l, d \d\e F \d\e Y')) }}

                    </p>

                    <p class="mb-0">

                        <span class="badge bg-success">

                            Sistema Operativo

                        </span>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>