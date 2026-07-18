<section>

    <div class="card border-danger">

        <div class="card-header bg-danger text-white">

            <h4 class="mb-0">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                Zona de peligro

            </h4>

        </div>

        <div class="card-body">

            <p class="text-muted">

                Si eliminas tu cuenta, toda la información asociada será eliminada permanentemente.
                Esta acción no podrá deshacerse.

            </p>

            <button
                type="button"
                class="btn btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#modalEliminarCuenta">

                <i class="bi bi-trash-fill me-2"></i>

                Eliminar mi cuenta

            </button>

        </div>

    </div>

</section>

<!-- Modal -->

<div class="modal fade"
     id="modalEliminarCuenta"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="POST"
                  action="{{ route('profile.destroy') }}">

                @csrf

                @method('DELETE')

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">

                        Confirmar eliminación

                    </h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <p>

                        ¿Seguro que deseas eliminar tu cuenta?

                    </p>

                    <p class="text-danger">

                        Esta acción es irreversible.

                    </p>

                    <label class="form-label">

                        Escribe tu contraseña para confirmar

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                    @error('password','userDeletion')

                        <div class="text-danger mt-2">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button
                        class="btn btn-danger">

                        <i class="bi bi-trash-fill me-2"></i>

                        Eliminar cuenta

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>