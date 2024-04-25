<!DOCTYPE html>
<html>

<head>
    <title>Tu nueva casa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/css/inicio.css', 'resources/bootstrap/css/bootstrap.min.css', 'resources/bootstrap/js/bootstrap.min.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
        integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> --}}
    <!-- Scripts -->

</head>

<body>
    <form method="POST" action="{{ route('propiedades.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="p-1 row padding-1">

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="pb-12 border-b border-gray-900/10 ">

                    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <label for="nombre"
                                class="block text-sm font-medium leading-6 text-gray-900 form-label">{{ __('Nombre') }}</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="nombre"
                                        class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" " id="nombre"
                                    placeholder="Nombre">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="apellidos" class="form-label">{{ __('apellidos') }}</label>
                        <div class="mt-2">
                            <input type="text" name="apellidos" rows="3"
                                class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 id="apellidos"
                                placeholder="apellidos">
                            {!! $errors->first('apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>


                    <div class="sm:col-span-3">
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900 form-label">{{ __('email') }}</label>
                        <div class="mt-2">
                            <input type="number" name="email"
                                class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                id="email" placeholder="email">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="direccion"
                            class="block text-sm font-medium leading-6 text-gray-900 form-label">{{ __('Direccion') }}</label>
                        <div class="mt-2">
                            <input type="email" name="direccion"
                                class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 id="direccion"
                                placeholder="Direccion">

                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="telefono"
                            class="block text-sm font-medium leading-6 text-gray-900 form-label">{{ __('Nº telefono') }}</label>
                        <div class="mt-2">
                            <input type="text" name="telefono"
                                class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                id="telefono"
                                placeholder="telefono">

                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="oferta"
                            class="block text-sm font-medium leading-6 text-gray-900 form-label">{{ __('Tu oferta') }}</label>
                        <div class="mt-2">
                            <input type="number" name="oferta"
                                class="form-control block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 id="oferta">

                        </div>
                    </div>


                <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="{{ route('propiedades.index') }}" class="btn btn-light" role="button">Cancelar</a>
                    <button type="submit"
                        class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Guardar') }}</button>
                </div>


            </div>
</form>
</body>

</html>
