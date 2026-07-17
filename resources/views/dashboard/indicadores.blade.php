<div class="row g-4 mb-5">

    <div class="col-lg-6">

        <div class="card border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            INGRESOS TOTALES

                        </small>

                        <h2 class="fw-bold text-success mt-2">

                            $ {{ number_format($ingresos,0,',','.') }}

                        </h2>

                    </div>

                    <i class="bi bi-cash-stack text-success"

                       style="font-size:70px;"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card border-0 shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            OCUPACIÓN

                        </small>

                        <h2 class="fw-bold text-primary mt-2">

                            {{ $ocupacion }}%

                        </h2>

                    </div>

                    <i class="bi bi-bar-chart-fill text-primary"

                       style="font-size:70px;"></i>

                </div>

            </div>

        </div>

    </div>

</div>