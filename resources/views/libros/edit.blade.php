@extends('layout.admin')

@section('title', 'Editar Libro | Panel de Administración')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Editar Libro</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                @csrf
                @method('PUT')

        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $libro->titulo) }}" required class="mt-1 block w-full 
            rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

        <div>
            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $libro->isbn) }}" required class="mt-1 block w-full 
            rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
            <input type="text" name="autor" id="autor" value="{{ old('autor', $libro->autor) }}" required class="mt-1 block w-full 
            rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
            <input type="text" name="editorial" id="editorial" value="{{ old('editorial', $libro->editorial) }}" required class="mt-1 block w-full 
            rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="categoria" id="categoria_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 
            focus:ring-indigo-500 sm:text-sm">
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                    Guardar Cambios
                </button>
            </form>
        </div>
    </div>
@endsection