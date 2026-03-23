@extends('layout.admin')

@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Agregar Préstamo</h1>

    <div class="bg-white shadow-md rounded-lg p-6">

        <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="space-y-6">
            @csrf

            <div class="mb-4">
                <label for="usuario_id" class="block text-gray-700 font-bold mb-2">ID Usuario:</label>
                <input
                    type="text"
                    name="usuario_id"
                    id="usuario_id"
                    value="{{ old('usuario_id') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                >
            </div>

            <div class="mb-4">
                <label for="usuario_nombre" class="block text-gray-700 font-bold mb-2">Nombre Usuario:</label>
                <input
                    type="text"
                    name="usuario_nombre"
                    id="usuario_nombre"
                    value="{{ old('usuario_nombre') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                >
            </div>

            <button
                type="submit"
                class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-800"
            >
                Buscar
            </button>
        </form>

        @isset($usuario)
            <div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                <h2 class="text-xl font-bold mb-4">Usuario encontrado</h2>
                <p><strong>ID:</strong> {{ $usuario->id }}</p>
                <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                <p><strong>Email:</strong> {{ $usuario->email }}</p>
            </div>

            <form action="{{ route('prestamos.select_libro') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

                <button
                    type="submit"
                    class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-800"
                >
                    Seleccionar Libro
                </button>
            </form>
        @endisset

    </div>
</div>

@endsection