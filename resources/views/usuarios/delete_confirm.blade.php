@extends('layout.admin')

@section('title', 'Eliminar Usuario | Panel de Administración')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Eliminar Usuario</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="mb-4">¿Estás seguro de que deseas eliminar al usuario <strong>{{ $usuario->name }}</strong>?</p>

            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">ID</th>
                        <th class="px-4 py-2 border-b text-left">Nombre</th>
                        <th class="px-4 py-2 border-b text-left">Email</th>
                        <th class="px-4 py-2 border-b text-left">Tipo de Usuario</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->user_type }}</td>
                    </tr>
                </tbody>
            </table>

            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Eliminar
                </button>
                <a href="{{ route('usuarios.index') }}" class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
            </form>
        </div>
    </div>




@endsection