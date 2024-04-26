<!DOCTYPE html>
<html>

<head>
    <title>Tu nueva casa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/css/oferta.css', 'resources/bootstrap/js/bootstrap.min.js', 'resources/bootstrap/css/bootstrap.min.css', 'resources/css/fontawesome-free/css/all.css', 'resources/css/icheck-bootstrap/icheck-bootstrap.min.css'])
    {{-- <link rel="stylesheet" href="{{ asset('oferta-CR1BjEiS.css ') }}"> --}}


    <!-- Scripts -->

</head>

<body>
    <nav class="container navbar navbar-expand-sm row">
        <div class="text-right col-12 col-md-12 col-lg-6 col-sm-4">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/imagesPlantilla/logow.png') }}" alt="logo" style="width: 30%">
            </a>
        </div>
        <div class="text-right col-8 col-md-12 col-lg-6 col-sm-8">
            <ul class="container navbar-nav icon">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-tripadvisor"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main') }}">Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portal') }}">| Inmuebles </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">| Login</a>
                </li>



            </ul>
        </div>
    </nav>
    @if ($message = Session::get('success'))
        <div class="m-4 alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                <strong>Errores encontrados:</strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @isset($msg)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡{{ $msg }}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <div class="oferta-main-wrapper">
        <!-- Author: oferta Team -->
        <!-- Learn More: https://oferta.com -->
        <div class="oferta-form-wrapper">
            <form action="{{ route('oferta', $data['id']) }}" method="POST" ">
                @method('PUT')
                @csrf
                <div>Vas a relizar una oferta por la propiedad:</div>
                <br>
                <div class="oferta-titulo ">
                    {{ $propiedad->titulo }}
                </div>
                <br>
                <input type="hidden" name="propiedad_id" id="propiedad_id" value="{{ $data['id'] }}"">

                <div>
                    <label for="nombre" class="oferta-form-label"> Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Juan" class="oferta-form-input" />
                </div>
                <div>
                    <label for="apellidos" class="oferta-form-label"> Apellidos </label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Vilas"
                        class="oferta-form-input" />
                </div>
                <div>
                    <label for="direccion" class="oferta-form-label"> Direccion </label>
                    <input type="text" name="direccion" id="direccion" placeholder="Rua del castillo 13"
                        class="oferta-form-input" />
                </div>

                <div class="oferta-input-flex">

                    <div>
                        <label for="telefono" class="oferta-form-label"> telefono </label>
                        <input type="text" name="telefono" id="telefono" placeholder="(+34) 657 789 543"
                            class="oferta-form-input" />
                    </div>
                    <div>
                        <label for="oferta" class="oferta-form-label"> Oferta </label>
                        <input type="text" name="oferta" id="oferta" class="oferta-form-input" />
                    </div>
                </div>


                <button class="oferta-btn">
                    Enviar Oferta
                </button>


            </form>
            <a href="{{ route('portal') }}">
                <button class="volver-btn">
                    Volver
                </button>
            </a>
        </div>

    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    </style>
