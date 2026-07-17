<div class="col-lg-4">

    <div class="card border-0 shadow h-100">

        <div class="card-header bg-white">

            <h5 class="mb-0">

                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>

                Accesos Rápidos

            </h5>

        </div>

        <div class="card-body">

            <div class="d-grid gap-3">

                <a href="{{ route('habitaciones.index') }}"
                   class="btn btn-outline-success">

                    <i class="bi bi-door-open-fill me-2"></i>

                    Habitaciones

                </a>

                <a href="{{ route('huespedes.index') }}"
                   class="btn btn-outline-warning">

                    <i class="bi bi-people-fill me-2"></i>

                    Huéspedes

                </a>

                <a href="{{ route('reservas.index') }}"
                   class="btn btn-outline-danger">

                    <i class="bi bi-calendar-check-fill me-2"></i>

                    Reservas

                </a>

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-outline-primary">

                    <i class="bi bi-person-circle me-2"></i>

                    Mi Perfil

                </a>

            </div>

        </div>

    </div>

</div>

</div>