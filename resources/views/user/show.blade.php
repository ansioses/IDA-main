@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Perfil de') . ' ' . __('usuario') }}
@endsection

@section('content')
    <section class="content container-fluid">
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
        @isset($mensaje)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡{{ $mensaje }}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endisset
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"
                        style="padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="block text-xl font-semibold">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('users.index') }}"
                                class="px-5 py-2 -mt-2 font-bold text-white bg-gray-700 rounded-full text-md hover:bg-gray-800">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="bg-white card-body">

                        <!-- component -->
                        <!-- This is an example component -->

                        <div class="h-full">

                            <div class="block border-b-2 md:flex">

                                <div class="w-full p-4 bg-white shadow-md md:w-2/5 sm:p-6 lg:p-8">
                                    <div class="flex justify-between">
                                        <span class="block text-xl font-semibold">Admin Profile</span>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="px-5 py-2 -mt-2 font-bold text-white bg-gray-700 rounded-full text-md hover:bg-gray-800">Edit</a>
                                    </div>

                                    <span class="text-gray-600">This information is secret so be careful</span>
                                    <div class="flex justify-center w-full p-8 mx-2">
                                        <img id="showImage" class="items-center w-32 max-w-xs border"
                                            src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200"
                                            alt="">
                                    </div>
                                </div>

                                <div class="w-full p-8 bg-white shadow-md md:w-3/5 lg:ml-4">
                                    <div class="p-6 rounded shadow">
                                        <div class="pb-6">
                                            <label for="name"
                                                class="block pb-1 font-semibold text-gray-700">Name</label>
                                            <div class="flex">
                                                <input disabled id="username" class="w-full px-4 py-2 rounded-r border-1"
                                                    type="text" value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="pb-4">
                                            <label for="about"
                                                class="block pb-1 font-semibold text-gray-700">Email</label>
                                            <input disabled id="email" class="w-full px-4 py-2 rounded-r border-1"
                                                type="email" value="{{ $user->email }}" />
                                            <span class="block pt-4 text-gray-600 opacity-70">Personal login information of
                                                your account</span>
                                        </div>
                                        <div class="pb-4">
                                            <label for="about" class="block pb-1 font-semibold text-gray-700">Profile
                                                Photo Path:</label>
                                            <input disabled id="photo" class="w-full px-4 py-2 rounded-r border-1"
                                                type="email" value="{{ $user->profile_photo_path }}" />
                                            <span class="block pt-4 text-gray-600 opacity-70">Personal Photo information of
                                                your account</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
