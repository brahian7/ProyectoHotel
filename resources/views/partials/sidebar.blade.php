<div class="col-md-2 d-none d-md-block bg-dark text-white min-vh-100 p-0">

    <div class="p-3">

        <h5 class="text-center mb-4">

            <i class="bi bi-list"></i>

            MENÚ

        </h5>

        <div class="list-group">

            <a href="{{ route('dashboard') }}"
               class="list-group-item list-group-item-action">

                <i class="bi bi-speedometer2 me-2"></i>

                Dashboard

            </a>

            <a href="{{ route('habitaciones.index') }}"
               class="list-group-item list-group-item-action">

                <i class="bi bi-door-open me-2"></i>

                Habitaciones

            </a>

            <a href="{{ route('huespedes.index') }}"
               class="list-group-item list-group-item-action">

                <i class="bi bi-people me-2"></i>

                Huéspedes

            </a>

            <a href="{{ route('reservas.index') }}"
               class="list-group-item list-group-item-action">

                <i class="bi bi-calendar-check me-2"></i>

                Reservas

            </a>

            @if(Auth::user()->rol == 'Administrador')

                <a href="#"
                   class="list-group-item list-group-item-action">

                    <i class="bi bi-person-gear me-2"></i>

                    Usuarios

                </a>

            @endif

        </div>

    </div>

</div>
