@extends('layout.admin')

@section('title', 'Crear Usuario | Panel de Administración')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Crear Usuario</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $usuario->name) }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $usuario->email) }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="user_type" class="block text-gray-700 font-bold mb-2">Tipo de Usuario:</label>
                <select
                    name="user_type"
                    id="user_type"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required>
                    <option value="">Selecciona un tipo de usuario</option>
                    <option value="admin" {{ old('user_type', $usuario->user_type) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="user" {{ old('user_type', $usuario->user_type) == 'user' ? 'selected' : '' }}>Usuario</option>
                    @error('user_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </select>
            </div>

            <button
                type="submit"
                class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-800"
            >
                Actualizar Usuario
            </button>
        </form>
    </div>
@endsection