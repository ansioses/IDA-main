<!DOCTYPE html>
<html>

<title>Tu nueva casa</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{-- @vite(['resources/css/inicio.css', 'resources/bootstrap/css/bootstrap.min.css', 'resources/bootstrap/js/bootstrap.min.js']) --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

{{-- <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" --}}
{{-- integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> --}}
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
    <main>
        <section class="content container-fluid">

            <div class="col-md-6 justify-content-center align-items-center">

                <div class="card card-default">
                    <div class="py-5 mx-auto bg-white card-header max-w-7xl sm:px-6 lg:px-8">
                        <span class="card-title">Hacer una oferta</span>
                    </div>
                    <div class="bg-white py-7 card-body sm:px-6 lg:px-8">
                        <form method="POST" action="http://127.0.0.1:8000/propiedades" role="form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="DZQDHoiolxQs3MdlNVinwGYjwlVm1IzzIOJmYcRZ"
                                autocomplete="off">
                            <div class="p-1 row padding-1 ">

                                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="pb-12 border-b border-gray-900/10 ">

                                        <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            <div class="sm:col-span-4">
                                                <label for="titulo"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Titulo</label>
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                                        <input type="text" name="titulo"
                                                            class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                            value="" id="titulo" placeholder="Titulo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="descripcion" class="form-label">Descripcion</label>
                                                <div class="mt-2">
                                                    <input type="text" name="descripcion" rows="3"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="descripcion" placeholder="Descripcion">

                                                </div>
                                            </div>


                                            <div class="sm:col-span-3">
                                                <label for="precio"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Precio</label>
                                                <div class="mt-2">
                                                    <input type="number" name="precio"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="precio" placeholder="Precio">
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="direccion"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Direccion</label>
                                                <div class="mt-2">
                                                    <input type="text" name="direccion"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="direccion" placeholder="Direccion">

                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="habitaciones"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Nº
                                                    Habitaciones</label>
                                                <div class="mt-2">
                                                    <input type="text" name="habitaciones"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="habitaciones" placeholder="habitaciones">

                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="WC"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Baños</label>
                                                <div class="mt-2">
                                                    <input type="number" name="WC"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="WC">

                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="plantas"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Nº
                                                    de plantas</label>
                                                <div class="mt-2">
                                                    <input type="number" name="plantas"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="plantas" placeholder="plantas">

                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="tipo"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Tipo
                                                    (casa, piso, etc)</label>
                                                <div class="mt-2">
                                                    <input type="text" name="tipo"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="tipo" placeholder="Piso o casa">

                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="size"
                                                    class="block text-sm font-medium leading-6 text-gray-900 form-label">Tamaño
                                                    (metros cuadrados)</label>
                                                <div class="mt-2">
                                                    <input type="number" name="size"
                                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        value="" id="size">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-end mt-6 gap-x-6">
                                            <a href="http://127.0.0.1:8000/propiedades" class="btn btn-light"
                                                role="button">Cancelar</a>
                                            <button type="submit"
                                                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                                        </div>


                                    </div>

                        </form>

                    </div>
                </div>
            </div>

        </section>
    </main>
    </div>


    <!-- Livewire Scripts -->
    <script src="/livewire/livewire.js?id=239a5c52" data-csrf="DZQDHoiolxQs3MdlNVinwGYjwlVm1IzzIOJmYcRZ"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
