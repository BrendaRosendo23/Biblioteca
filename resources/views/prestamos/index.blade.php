@extends('layout.admin')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6 flex items-center justify-between gap-3">
            <h1 class="text-2xl font-bold">Prestamos</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a
                href="{{ route('prestamos.create') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800"
            >
                Crear Prestamo
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">ID</th>
                        <th class="px-4 py-2 border-b text-left">Libro</th>
                        <th class="px-4 py-2 border-b text-left">Usuario</th>
                        <th class="px-4 py-2 border-b text-left">Fecha</th>
                        <th class="px-4 py-2 border-b text-left">Estatus</th>
                        <th class="px-4 py-2 border-b text-left">Fecha entrega</th>
                        <th class="px-4 py-2 border-b text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $prestamo)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-2 border-b">{{ $prestamo->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->libro->titulo }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->usuario->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">
                                 @if($prestamo->estado == 'pendiente')
                                <span class="rounded-full bg-rose-50 px-2 py-1 text-xs font-semibold text-rose-700">Pendiente</span>
                                @else
                                <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700">Entregado</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->fecha_entrega ? $prestamo->fecha_entrega: '' }}</td>
                            <td class="px-4 py-3 border-b">
                                @if($prestamo->estado == 'pendiente')
                                <a href="{{ route('prestamos.entregar', $prestamo->id) }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Entregar</a>
                                @endif                           
                            </td>
                        </tr> 
                    @endforeach      
                </tbody>
            </table>
        </div>
    </div>

@endsection