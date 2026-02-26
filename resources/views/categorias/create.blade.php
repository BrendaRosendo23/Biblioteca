@extends('layout.admin')

@section('content')

@section('title', 'Crear Categoría | Panel de Administración')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Crear Nueva Categoría</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('categorias.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
                    <input type="text" name="nombre" id="nombre" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Crear Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection