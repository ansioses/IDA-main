@extends('layouts.app')

@section('template_title')
    <title class="text-lg font-medium">Listado de Ofertas</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="px-4 mx-auto bg-white card-header max-w-screen-2xl sm:px-6 lg:px-8 py-7">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h1 class="px-5 text-lg">Listado de Ofertas</h1>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="m-4 alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="px-4 mx-auto bg-white card-body max-w-screen-2xl sm:px-6 lg:px-8">
                        <div class="table-responsive">
                            <div class="p-6 px-0 overflow-scroll">
                                <table class="w-full mt-4 text-left table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                                class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Propiedad <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                                    </svg>
                                                </p>
                                            </th>

                                            <th class="">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Oferta <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                                    </svg>
                                                </p>
                                            </th>
                                            <th
                                                class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Precio <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                                    </svg>
                                                </p>
                                            </th>
                                            <th
                                                class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Contacto <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                                    </svg>
                                                </p>
                                            </th>
                                            <th
                                                class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Teléfono <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                                    </svg>
                                                </p>
                                            </th>

                                            <th
                                                class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                                <p
                                                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    Acciones</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listado as $propiedad)
                                            <tr>

                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex flex-col">
                                                            <p
                                                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                                {{ $propiedad->titulo }}</p>
                                                            <p
                                                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                                                                {{-- Fecha de alta: {{ $propiedad->created_at->format('d-m-Y') }} --}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="flex items-center gap-3">

                                                        <div class="flex flex-col">
                                                            <p
                                                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                                {{ $propiedad->oferta }}</p>
                                                        </div>
                                                    </div>


                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="flex flex-col">
                                                        <p
                                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                            {{ $propiedad->precio }}</p>

                                                    </div>
                                                </td>
                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="w-max">
                                                        <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-600 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20"
                                                            style="opacity: 1;">

                                                            <p
                                                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                                                                {{ $propiedad->nombre }} </p>
                                                            <p>{{ $propiedad->apellidos }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="flex flex-col">
                                                        <p
                                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                            {{ $propiedad->telefono }}</p>

                                                    </div>
                                                </td>

                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <form action="{{ route('oferta', $propiedad->id) }}" method="POST">

                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- {!! $propiedades->links() !!} --}}
                </div>
            </div>
        </div>
    @endsection
