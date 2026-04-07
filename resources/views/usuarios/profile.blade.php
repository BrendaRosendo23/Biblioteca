@extends('layout.admin')

@section('title', 'Perfil de Usuario')

@section('content')
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Perfil de Usuario</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <span class="font-bold">Éxito:</span> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <span class="font-bold">Error:</span> {{ session('error') }}
            </div>
        @endif


        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Información del Perfil</h2>
        <form action ="{{ route('usuarios.update_profile') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method ('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del usuario:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ Auth::user()->name }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
            </div>

            <!--<div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ Auth::user()->email }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
            </div>-->

            <div class="mb-4">
                <label for="created_at" class="block text-gray-700 font-bold mb-2">Fecha de Creación:</label>
                <input
                    type="text"
                    name="created_at"
                    id="created_at"
                    value="{{ Auth::user()->created_at->format('d/m/Y H:i') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    disabled
                >
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Actualizar Perfil
                </button>
            </div>
        </form>

            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Cambiar Contraseña</h2>
        <form action ="{{ route('usuarios.update_password') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method ('PUT')
            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 font-bold mb-2">Contraseña actual:</label>
                <input
                    type="password"
                    name="current_password"
                    id="current_password"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 font-bold mb-2">Nueva contraseña:</label>
                <input
                    type="password"
                    name="new_password"
                    id="new_password"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar nueva contraseña:</label>
                <input
                    type="password"
                    name="new_password_confirmation"
                    id="new_password_confirmation"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Actualizar Contraseña
                </button>
            </div>
        </form>

        </div>

            <div class="mt-6">
                <a href="{{ route('home') }}" class="inline-block rounded-xl px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300">
                    volver al inicio
                </a>

    </div>


@endsection