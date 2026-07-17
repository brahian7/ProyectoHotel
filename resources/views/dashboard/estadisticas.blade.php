<div class="row g-4 mb-5">

    {{-- Usuarios --}}
    <div class="col-xl-3 col-md-6" data-aos="zoom-in">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted text-uppercase">

                            Usuarios

                        </small>

                        <h2 class="contador fw-bold mt-2"
                            data-target="{{ $usuarios }}">

                            0

                        </h2>

                    </div>

                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                        <i class="bi bi-person-fill text-primary fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Habitaciones --}}
    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted text-uppercase">

                            Habitaciones

                        </small>

                        <h2 class="contador fw-bold mt-2"
                            data-target="{{ $habitaciones }}">

                            0

                        </h2>

                    </div>

                    <div class="bg-success bg-opacity-10 rounded-circle p-3">

                        <i class="bi bi-door-open-fill text-success fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Huéspedes --}}
    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted text-uppercase">

                            Huéspedes

                        </small>

                        <h2 class="contador fw-bold mt-2"
                            data-target="{{ $huespedes }}">

                            0

                        </h2>

                    </div>

                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                        <i class="bi bi-people-fill text-warning fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Reservas --}}
    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted text-uppercase">

                            Reservas

                        </small>

                        <h2 class="contador fw-bold mt-2"
                            data-target="{{ $reservas }}">

                            0

                        </h2>

                    </div>

                    <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                        <i class="bi bi-calendar-check-fill text-danger fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>