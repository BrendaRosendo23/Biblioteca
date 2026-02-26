@extends('layout.admin')

@section('title', 'Biblioteca | Panel de Administración')

@section('content')
  {{-- Dashboard / contenido central (AZUL) --}}

  {{-- Resumen --}}
  <section class="space-y-4">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <h2 class="text-xl font-bold">Resumen</h2>
        <p class="text-sm text-slate-600">Vista general de actividad y accesos rápidos.</p>
      </div>
      <div class="flex gap-2">
        <button class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
          + Nuevo préstamo
        </button>
        <button class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50">
          + Nuevo libro
        </button>
      </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
      <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-sm text-slate-600">Usuarios</p>
        <p class="mt-2 text-2xl font-bold">1,245</p>
        <p class="mt-1 text-xs text-slate-500">Activos este mes</p>
      </article>

      <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-sm text-slate-600">Libros</p>
        <p class="mt-2 text-2xl font-bold">8,920</p>
        <p class="mt-1 text-xs text-slate-500">En catálogo</p>
      </article>

      <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-sm text-slate-600">Préstamos</p>
        <p class="mt-2 text-2xl font-bold">312</p>
        <p class="mt-1 text-xs text-slate-500">En curso</p>
      </article>

      <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-sm text-slate-600">Atrasos</p>
        <p class="mt-2 text-2xl font-bold">27</p>
        <p class="mt-1 text-xs text-slate-500">Requieren seguimiento</p>
      </article>
    </div>
  </section>

  {{-- Usuarios --}}
  <section class="mt-8 space-y-4">
    <header class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-bold">Usuarios</h2>
        <p class="text-sm text-slate-600">Gestión de lectores y administradores.</p>
      </div>
      <button class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">
        + Agregar usuario
      </button>
    </header>

    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
      <div class="flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-2">
          <label for="buscarUsuario" class="sr-only">Buscar usuario</label>
          <input id="buscarUsuario" type="search" placeholder="Buscar por nombre o correo..."
                 class="w-full sm:w-80 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div class="flex gap-2">
          <select class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm">
            <option>Todos</option>
            <option>Lectores</option>
            <option>Administradores</option>
          </select>
          <button class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold hover:bg-slate-50">
            Filtrar
          </button>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-slate-50 text-left text-slate-600">
            <tr>
              <th class="px-4 py-3 font-semibold">Nombre</th>
              <th class="px-4 py-3 font-semibold">Correo</th>
              <th class="px-4 py-3 font-semibold">Rol</th>
              <th class="px-4 py-3 font-semibold">Estado</th>
              <th class="px-4 py-3 font-semibold">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr>
              <td class="px-4 py-3 font-medium">María López</td>
              <td class="px-4 py-3 text-slate-600">maria@correo.com</td>
              <td class="px-4 py-3">Lector</td>
              <td class="px-4 py-3">
                <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700">Activo</span>
              </td>
              <td class="px-4 py-3">
                <button class="rounded-lg px-3 py-1 text-xs font-semibold hover:bg-slate-100">Editar</button>
                <button class="rounded-lg px-3 py-1 text-xs font-semibold text-rose-700 hover:bg-rose-50">Bloquear</button>
              </td>
            </tr>
            <tr>
              <td class="px-4 py-3 font-medium">Juan Pérez</td>
              <td class="px-4 py-3 text-slate-600">juan@correo.com</td>
              <td class="px-4 py-3">Administrador</td>
              <td class="px-4 py-3">
                <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700">Activo</span>
              </td>
              <td class="px-4 py-3">
                <button class="rounded-lg px-3 py-1 text-xs font-semibold hover:bg-slate-100">Editar</button>
                <button class="rounded-lg px-3 py-1 text-xs font-semibold text-rose-700 hover:bg-rose-50">Bloquear</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex items-center justify-between p-4 text-xs text-slate-500">
        <span>Mostrando 2 de 1245 usuarios</span>
        <div class="flex gap-2">
          <button class="rounded-lg border border-slate-200 bg-white px-3 py-1 hover:bg-slate-50">Anterior</button>

          {{-- Números --}}
            <button type="button" class="rounded-lg border border-slate-200 bg-white px-3 py-1 hover:bg-slate-50">1</button>

            <button type="button" class="rounded-lg border border-slate-200 bg-white px-3 py-1 hover:bg-slate-50">2</button>

            <button type="button" class="rounded-lg border border-slate-200 bg-white px-3 py-1 hover:bg-slate-50">3</button>

          <button class="rounded-lg border border-slate-200 bg-white px-3 py-1 hover:bg-slate-50">Siguiente</button>
        </div>
      </div>
    </div>
  </section>

  {{-- Libros --}}
  <section class="mt-8 space-y-4">
    <header class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-bold">Libros</h2>
        <p class="text-sm text-slate-600">Altas, edición, stock y disponibilidad.</p>
      </div>
      <a class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700" href="{{ route('libros.create') }}">
        + Agregar libro
      </a>
    </header>

    <div class="grid gap-4 lg:grid-cols-3">
    <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm lg:col-span-3">
      <h3 class="font-semibold">Catálogo</h3>
      <p class="mt-1 text-sm text-slate-600">Listado rápido con estado y acciones.</p>

      
      <div class="mt-4 overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-slate-50 text-left text-slate-600">
            <tr>
              <th class="px-4 py-3 font-semibold">Título</th>
              <th class="px-4 py-3 font-semibold">Autor</th>
              <th class="px-4 py-3 font-semibold">ISBN</th>
              <th class="px-4 py-3 font-semibold">Categorías</th>
              <th class="px-4 py-3 font-semibold">Disponible</th>
              <th class="px-4 py-3 font-semibold">Acciones</th>
            </tr>
          </thead>

          @foreach($libros as $libro)
          <tbody class="divide-y divide-slate-100">
            <tr>
              <td class="px-4 py-3 font-medium">{{ $libro->titulo }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $libro->autor }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $libro->isbn }}</td>
              <td class="px-4 py-3">
                <div class="flex flex-wrap gap-2">
                  <span class="rounded-full bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-700">{{ $libro->categoria->nombre }}</span>
                </div>
              </td>
              <td class="px-4 py-3">
                <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700">Sí</span>
              </td>
              <td class="px-4 py-3">
                <a href="{{ route('libros.edit', $libro->id) }}" class="rounded-lg px-3 py-1 text-xs font-semibold hover:bg-slate-100">Editar</a>
                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este libro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg px-3 py-1 text-xs font-semibold text-rose-700 hover:bg-rose-50">Eliminar</button>
                </form>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Footer de paginación (MOCK / sin datos reales) --}}
      <div class="flex items-center justify-between p-4 text-xs text-slate-500">
        <span>Mostrando {{ $libros->firstItem() }} a {{ $libros->lastItem() }} de {{ $libros->total() }} libros</span>
      {{ $libros->links() }}


        </div>
      </article>
    </div>
  </section>

  {{-- Préstamos --}}
  <section class="mt-8 space-y-4">
    <header class="flex items-center justify-between">
      <div>
        <h2 class="text-xl font-bold">Préstamos</h2>
        <p class="text-sm text-slate-600">Registro y seguimiento de préstamos.</p>
      </div>
      <button class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
        + Registrar préstamo
      </button>
    </header>

    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
      <div class="grid gap-3 md:grid-cols-3">
        <div>
          <label class="text-sm font-semibold">Usuario</label>
          <input type="text" placeholder="Ej. Juan Pérez"
                 class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="text-sm font-semibold">Libro</label>
          <input type="text" placeholder="Ej. El principito"
                 class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="text-sm font-semibold">Fecha de devolución</label>
          <input type="date"
                 class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
      </div>

      <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:justify-end">
        <button class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50">
          Limpiar
        </button>
        <button class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">
          Guardar
        </button>
      </div>
    </div>
  </section>

@endsection
