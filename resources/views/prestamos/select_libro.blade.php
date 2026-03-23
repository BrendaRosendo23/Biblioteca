@extends('layout.admin')

@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Seleccionar Libro</h1>

    <div class="bg-white shadow-md rounded-lg p-6">

        <div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded mb-6">
            <h2 class="text-xl font-bold mb-4">Usuario:</h2>
            <p><strong>ID:</strong> {{ $usuario->id }}</p>
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
        </div>

        <form action="{{ route('prestamos.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

            <div class="mb-4">
                <label for="libro_id" class="block text-gray-700 font-bold mb-2">Libro:</label>
                <select
                    name="libro_id"
                    id="libro_id"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required
                >
                    <option value="">Seleccione un libro</option>
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}">
                            {{ $libro->titulo }} - {{ $libro->autor }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button
                type="submit"
                class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-800"
            >
                Prestar
            </button>
        </form>

    </div>
</div>

@endsection