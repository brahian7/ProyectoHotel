@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    @include('dashboard.bienvenida')

    @include('dashboard.estadisticas')

    @include('dashboard.habitaciones')

    @include('dashboard.indicadores')

    @include('dashboard.grafico')

    @include('dashboard.reservas')

    @include('dashboard.accesos')

    @include('dashboard.informacion')

</div>

@endsection

@include('dashboard.scripts')