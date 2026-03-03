<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Panel | Biblioteca')</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    html { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
  </style>

  @stack('head')
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">

  {{-- Overlay móvil --}}
  <div id="overlay" class="fixed inset-0 z-30 hidden bg-black/40 lg:hidden" aria-hidden="true"></div>

  {{-- Layout principal --}}
  <div class="min-h-screen lg:grid lg:grid-cols-[280px_1fr]">

    {{-- Sidebar --}}
    <aside
      id="sidebar"
      class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full bg-white shadow-lg transition-transform duration-200 lg:static lg:translate-x-0 lg:shadow-none border-r border-slate-200"
      aria-label="Barra lateral"
    >
      <div class="flex h-16 items-center justify-between px-4 border-b border-slate-200">
        <div class="flex items-center gap-2">
          <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 text-white font-bold">B</span>
          <div class="leading-tight">
            <p class="font-semibold">Biblioteca</p>
            <p class="text-xs text-slate-500">Administración</p>
          </div>
        </div>

        <button
          id="closeSidebarBtn"
          class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          aria-label="Cerrar menú lateral"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <nav class="p-4" aria-label="Navegación lateral">
        <ul class="space-y-1">
          <li>
            <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100">
              <span class="font-medium">Inicio</span>
            </a>
          </li>

          <li>
            <a href="{{ route('usuarios.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100">
              <span class="font-medium">Usuarios</span>
            </a>
          </li>

          <li>
            <a href="{{ route('categorias.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100">
              <span class="font-medium">Categorías</span>
            </a>
          </li>

          <li>
            <a href="" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100">
              <span class="font-medium">Libros</span>
            </a>
          </li>

          <li>
            <a href="" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100">
              <span class="font-medium">Préstamos</span>
            </a>
          </li>

          <li class="pt-2">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full flex items-center gap-3 rounded-xl px-3 py-2 text-rose-700 hover:bg-rose-50">
                <span class="font-medium">Salir</span>
              </button>
            </form>
          </li>
        </ul>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-4">
          <p class="text-sm font-semibold">Tip rápido</p>
          <p class="mt-1 text-sm text-slate-600">En móvil, usa el botón ☰ para abrir el menú lateral.</p>
        </div>
      </nav>
    </aside>

    {{-- Contenido + header --}}
    <div class="flex min-h-screen flex-col">

      <header class="sticky top-0 z-20 bg-white/80 backdrop-blur border-b border-slate-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between gap-4">

            <div class="flex items-center gap-3">
              <button
                id="openSidebarBtn"
                class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-label="Abrir menú"
                aria-controls="sidebar"
                aria-expanded="false"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
              </button>

              <div>
                <h1 class="text-base sm:text-lg font-semibold">@yield('header_title', 'Panel de Administración')</h1>
                <p class="hidden sm:block text-xs text-slate-500">@yield('header_subtitle', 'Gestión de usuarios, libros y préstamos')</p>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <div class="hidden sm:flex items-center gap-2 rounded-2xl bg-slate-100 px-3 py-2">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white text-sm font-semibold">
                  {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                </span>
                <div class="leading-tight">
                  <p class="text-sm font-semibold">{{ Auth::user()->name ?? 'Admin' }}</p>
                  <p class="text-xs text-slate-600">{{ Auth::user()->email ?? 'admin@biblioteca' }}</p>
                </div>
              </div>

              <form method="POST" action="{{ route('logout') }}" class="hidden lg:block">
                @csrf
                <button type="submit" class="rounded-xl px-3 py-2 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                  Salir
                </button>
              </form>
            </div>

          </div>
        </div>
      </header>

      <main class="flex-1">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
          @yield('content')
        </div>
      </main>

      {{-- footer opcional si quieres --}}
       @include('partials.admin.footer') 
    </div>
  </div>

  @stack('scripts')

  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const openBtn = document.getElementById('openSidebarBtn');
    const closeBtn = document.getElementById('closeSidebarBtn');

    const setSidebar = (open) => {
      if (open) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        openBtn?.setAttribute('aria-expanded', 'true');
        document.body.classList.add('overflow-hidden');
      } else {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        openBtn?.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('overflow-hidden');
      }
    };

    openBtn?.addEventListener('click', () => setSidebar(true));
    closeBtn?.addEventListener('click', () => setSidebar(false));
    overlay?.addEventListener('click', () => setSidebar(false));

    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        openBtn?.setAttribute('aria-expanded', 'false');
      } else {
        setSidebar(false);
      }
    });
  </script>
</body>
</html>
