<x-guest-layout>

    <div class="text-center mb-5">

        <h1 class="fw-bold mb-4">
            Verificación de seguridad
        </h1>

        <p class="fs-5 text-secondary mb-2">
            Hemos enviado un código de verificación a tu correo electrónico.
        </p>

        <p class="fw-bold text-danger fs-5">
            El código expirará en 10 minutos.
        </p>

    </div>

    @if(session('status'))

        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>

    @endif

    <form method="POST" action="{{ route('otp.store') }}">

        @csrf

        <div class="mb-4">

            <label
                for="codigo"
                class="form-label fw-semibold fs-5"
            >
                Código OTP
            </label>

            <input
                id="codigo"
                name="codigo"
                type="text"
                maxlength="6"
                autofocus
                required
                class="form-control form-control-lg text-center"
                style="
                    letter-spacing:12px;
                    font-size:28px;
                    font-weight:bold;
                "
            >

            @error('codigo')

                <div class="text-danger mt-2">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <button
            type="submit"
            class="btn btn-primary w-100 py-3 fs-5 fw-bold shadow"
        >
            <i class="bi bi-shield-check me-2"></i>

            Verificar código
        </button>

    </form>

    <div class="text-center mt-4">

        <form
            method="POST"
            action="{{ route('otp.resend') }}"
        >

            @csrf

            <button
                type="submit"
                class="btn btn-outline-primary px-4"
            >
                <i class="bi bi-arrow-repeat me-2"></i>

                Reenviar código
            </button>

        </form>

    </div>

</x-guest-layout>