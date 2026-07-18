<x-guest-layout>

    <div class="text-center mb-4">

        <i class="bi bi-building-fill text-primary" style="font-size:60px;"></i>

        <h2 class="mt-3 fw-bold">

            Crear cuenta

        </h2>

        <p class="text-muted">

            Regístrate para reservar tu habitación.

        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        {{-- Nombre --}}

        <div>

            <x-input-label
                for="nombre"
                value="Nombre"
            />

            <x-text-input
                id="nombre"
                class="block mt-1 w-full"
                type="text"
                name="nombre"
                :value="old('nombre')"
                required
                autofocus
            />

            <x-input-error
                :messages="$errors->get('nombre')"
                class="mt-2"
            />

        </div>

        {{-- Apellido --}}

        <div class="mt-4">

            <x-input-label
                for="apellido"
                value="Apellido"
            />

            <x-text-input
                id="apellido"
                class="block mt-1 w-full"
                type="text"
                name="apellido"
                :value="old('apellido')"
                required
            />

            <x-input-error
                :messages="$errors->get('apellido')"
                class="mt-2"
            />

        </div>

        {{-- Correo --}}

        <div class="mt-4">

            <x-input-label
                for="email"
                value="Correo electrónico"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        {{-- Contraseña --}}

        <div class="mt-4">

            <x-input-label
                for="password"
                value="Contraseña"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        {{-- Confirmar contraseña --}}

        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                value="Confirmar contraseña"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <div class="flex items-center justify-between mt-6">

            <a
                href="{{ route('login') }}"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >

                ¿Ya tienes cuenta?

            </a>

            <x-primary-button>

                Crear Cuenta

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>