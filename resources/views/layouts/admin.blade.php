<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>@yield('title', 'Hotel Central La Italia')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS + JS -->
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-light">

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container-fluid">

        <div class="row">

            {{-- Sidebar --}}
            @include('partials.sidebar')

            {{-- Contenido --}}
            <main class="col-md-10 ms-sm-auto px-4 py-4">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>

                            Se encontraron los siguientes errores:

                        </strong>

                        <ul class="mt-2 mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                @yield('content')

            </main>

        </div>

    </div>

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Mensajes de éxito --}}
    @if(session('success'))

        <script>

            Swal.fire({

                icon: 'success',

                title: '¡Excelente!',

                text: "{{ session('success') }}",

                confirmButtonColor: '#198754'

            });

        </script>

    @endif

    {{-- Mensajes de error --}}
    @if(session('error'))

        <script>

            Swal.fire({

                icon: 'error',

                title: 'Ha ocurrido un problema',

                text: "{{ session('error') }}",

                confirmButtonColor: '#dc3545'

            });

        </script>

    @endif

    {{-- Confirmación para eliminar --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.formulario-eliminar').forEach(function(formulario){

                formulario.addEventListener('submit', function(e){

                    e.preventDefault();

                    Swal.fire({

                        title: '¿Está seguro?',

                        text: 'Esta acción no podrá deshacerse.',

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonColor: '#dc3545',

                        cancelButtonColor: '#6c757d',

                        confirmButtonText: 'Sí, eliminar',

                        cancelButtonText: 'Cancelar'

                    }).then((result)=>{

                        if(result.isConfirmed){

                            formulario.submit();

                        }

                    });

                });

            });

        });

    </script>

</body>

</html>
