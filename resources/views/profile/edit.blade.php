@extends('layouts.app')

@section('title','Mi Perfil')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0">

                <div class="card-body p-5">

                    <div class="row">

                        {{-- Avatar --}}

                        <div class="col-lg-4 text-center border-end">

                            <div
                                class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center mx-auto shadow"
                                style="width:150px;height:150px;font-size:55px;font-weight:bold;">

                                {{ strtoupper(substr($user->nombre,0,1)) }}
                                {{ strtoupper(substr($user->apellido,0,1)) }}

                            </div>

                            <h3 class="mt-4">

                                {{ $user->nombre }}

                                {{ $user->apellido }}

                            </h3>

                            <span class="badge bg-primary fs-6">

                                {{ $user->rol }}

                            </span>

                            <div class="mt-3">

                                @if($user->estado)

                                    <span class="badge bg-success">

                                        Activo

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Inactivo

                                    </span>

                                @endif

                            </div>

                            <hr>

                            <p class="text-muted">

                                Miembro desde

                                <br>

                                <strong>

                                    {{ $user->created_at->format('d/m/Y') }}

                                </strong>

                            </p>

                        </div>

                        {{-- Contenido --}}

                        <div class="col-lg-8">

                            @include('profile.partials.update-profile-information-form')

                            <hr class="my-5">

                            @include('profile.partials.update-password-form')

                            <hr class="my-5">

                            @include('profile.partials.delete-user-form')

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection