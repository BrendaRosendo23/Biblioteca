@extends('layout.admin')

@section('title', 'Usuarios | Panel de Administración')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6 flex items-center justify-between gap-3">
            <h1 class="text-2xl font-bold">Usuarios</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a
                href="{{ route('usuarios.create') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800"
            >
                Agregar
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">ID</th>
                        <th class="px-4 py-2 border-b text-left">Nombre</th>
                        <th class="px-4 py-2 border-b text-left">Email</th>
                        <th class="px-4 py-2 border-b text-left">Tipo de Usuario</th>
                        <th class="px-4 py-2 border-b text-left">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $usuario->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $usuario->user_type }}</td>
                            <td class="px-4 py-3 border-b">
                                <a
                                    href="{{ route('usuarios.edit', $usuario->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('usuarios.destroy', $usuario->id) }}"
                                    method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-slate-500">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            
        </div>
    </div>
@endsection