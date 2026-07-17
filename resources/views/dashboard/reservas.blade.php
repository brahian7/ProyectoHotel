<div class="row g-4 mb-5">

    <div class="col-lg-8">

        <div class="card border-0 shadow">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-clock-history text-success me-2"></i>

                    Últimas Reservas

                </h5>

            </div>

            <div class="card-body p-0">

                @if($ultimasReservas->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                        <tr>

                            <th>Código</th>

                            <th>Huésped</th>

                            <th>Habitación</th>

                            <th>Total</th>

                            <th>Estado</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($ultimasReservas as $reserva)

                        <tr>

                            <td>{{ $reserva->codigo_reserva }}</td>

                            <td>

                                {{ $reserva->huesped->nombre }}

                                {{ $reserva->huesped->apellido }}

                            </td>

                            <td>

                                {{ $reserva->habitacion->numero }}

                            </td>

                            <td>

                                ${{ number_format($reserva->total,0,',','.') }}

                            </td>

                            <td>

                                @php

                                    $color='secondary';

                                    if($reserva->estado=='Pendiente') $color='warning';

                                    if($reserva->estado=='Activa') $color='success';

                                    if($reserva->estado=='Finalizada') $color='primary';

                                    if($reserva->estado=='Cancelada') $color='danger';

                                @endphp

                                <span class="badge bg-{{ $color }}">

                                    {{ $reserva->estado }}

                                </span>

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                @else

                <div class="text-center py-5">

                    <i class="bi bi-calendar-x fs-1 text-secondary"></i>

                    <p class="mt-3 text-muted">

                        No existen reservas registradas.

                    </p>

                </div>

                @endif

            </div>

        </div>

    </div>