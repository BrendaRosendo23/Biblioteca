<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Biblioteca municipal</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    html { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
  </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
  <!-- HEADER -->
  <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <!-- Logo -->
        <a href="#inicio" class="flex items-center gap-2">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-white font-bold">B</span>
          <div class="leading-tight">
            <p class="font-semibold">Biblioteca</p>
            <p class="text-xs text-slate-500">Lectura para todos</p>
          </div>
        </a>

        <!-- Menú escritorio -->
        <nav class="hidden md:block" aria-label="Navegación principal">
          <ul class="flex items-center gap-2">
            <li>
              <a href="#inicio" class="rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                Inicio
              </a>
            </li>
            <li>
              <a href="#login" class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                Login
              </a>
            </li>
          </ul>
        </nav>

        <!-- Botón hamburguesa (móvil) -->
        <button
          id="btnOpen"
          class="md:hidden inline-flex items-center justify-center rounded-xl p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          aria-label="Abrir menú"
          aria-controls="mobileMenu"
          aria-expanded="false"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Menú móvil desplegable -->
    <div id="mobileMenu" class="md:hidden hidden border-t border-slate-200 bg-white">
      <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-3" aria-label="Navegación móvil">
        <ul class="flex flex-col gap-2">
          <li>
            <a href="#inicio" class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">
              Inicio
            </a>
          </li>
          <li>
            <a href="#login" class="block rounded-xl bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
              Login
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- MAIN -->
  <main id="inicio">
    <!-- HERO -->
    <section class="relative overflow-hidden">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
          <!-- Texto -->
          <div>
            <p class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-3 py-1 text-sm font-semibold text-indigo-700">
              📚 Biblioteca digital y presencial
            </p>

            <h1 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
              Descubre, reserva y disfruta miles de libros en un solo lugar.
            </h1>

            <p class="mt-4 text-base sm:text-lg text-slate-600">
              Consulta el catálogo, revisa disponibilidad y gestiona tus préstamos de manera rápida.
              Ideal para estudiantes, docentes y amantes de la lectura.
            </p>

            <div class="mt-6 flex flex-col sm:flex-row gap-3">
              <a href="#login" class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700">
                Iniciar sesión
              </a>
              <a href="#catalogo" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold hover:bg-slate-50">
                Ver catálogo
              </a>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3 max-w-md">
              <div class="rounded-2xl border border-slate-200 bg-white p-3">
                <p class="text-xs text-slate-500">Libros</p>
                <p class="text-lg font-bold">10k+</p>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-white p-3">
                <p class="text-xs text-slate-500">Usuarios</p>
                <p class="text-lg font-bold">2k+</p>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-white p-3">
                <p class="text-xs text-slate-500">Préstamos</p>
                <p class="text-lg font-bold">Rápidos</p>
              </div>
            </div>
          </div>

          <!-- Imagen principal -->
          <div class="relative">
            <div class="absolute -inset-6 -z-10 rounded-[2.5rem] bg-indigo-100 blur-2xl"></div>

            <img
              class="w-full rounded-3xl border border-slate-200 shadow-lg object-cover aspect-[4/3]"
              src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1400&q=80"
              alt="Persona leyendo en una biblioteca"
              loading="lazy"
            />

            <div class="mt-4 grid grid-cols-2 gap-4">
              <img
                class="rounded-2xl border border-slate-200 bg-white shadow-sm object-cover aspect-[4/3]"
                src="https://images.unsplash.com/photo-1455885666463-8d69c7f37d49?auto=format&fit=crop&w=900&q=80"
                alt="Libros apilados"
                loading="lazy"
              />
              <img
                class="rounded-2xl border border-slate-200 bg-white shadow-sm object-cover aspect-[4/3]"
                src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=900&q=80"
                alt="Estanterías de biblioteca"
                loading="lazy"
              />
            </div>

            <p class="mt-3 text-xs text-slate-500">
              Imágenes de stock libres: Unsplash (licencia libre para uso comercial).
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- CATÁLOGO / CTA -->
    <section id="catalogo" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-14">
      <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
          <div>
            <h2 class="text-2xl font-bold">Explora el catálogo</h2>
            <p class="mt-2 text-slate-600">
              Busca por título, autor o categoría. Reserva en segundos.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row gap-3">
            <label class="sr-only" for="busqueda">Buscar</label>
            <input
              id="busqueda"
              type="search"
              placeholder="Buscar libros..."
              class="w-full sm:w-72 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <button
              class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800"
              type="button"
            >
              Buscar
            </button>
          </div>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <article class="rounded-2xl border border-slate-200 p-4">
            <p class="text-sm font-semibold">Recomendado</p>
            <p class="mt-1 text-sm text-slate-600">Novedades y lecturas populares.</p>
          </article>
          <article class="rounded-2xl border border-slate-200 p-4">
            <p class="text-sm font-semibold">Categorías</p>
            <p class="mt-1 text-sm text-slate-600">Ciencia, literatura, historia y más.</p>
          </article>
          <article class="rounded-2xl border border-slate-200 p-4">
            <p class="text-sm font-semibold">Préstamos</p>
            <p class="mt-1 text-sm text-slate-600">Controla tus fechas de devolución.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- LOGIN -->
    <section id="login" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16">
      <div class="grid gap-6 lg:grid-cols-2 lg:items-center">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
          <h2 class="text-2xl font-bold">Login</h2>
          <p class="mt-2 text-slate-600">Accede para gestionar tus préstamos y reservas.</p>

          <form class="mt-6 space-y-4">
            <div>
              <label class="text-sm font-semibold" for="email">Correo</label>
              <input
                id="email"
                type="email"
                placeholder="tu@correo.com"
                class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
              />
            </div>

            <div>
              <label class="text-sm font-semibold" for="pass">Contraseña</label>
              <input
                id="pass"
                type="password"
                placeholder="••••••••"
                class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
              />
            </div>

            <button
              type="button"
              class="w-full rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700"
            >
              Entrar
            </button>
          </form>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
          <h3 class="text-lg font-bold">Beneficios</h3>
          <ul class="mt-3 space-y-2 text-sm text-slate-600">
            <li>✅ Reservas rápidas</li>
            <li>✅ Historial de préstamos</li>
            <li>✅ Alertas de devolución</li>
            <li>✅ Recomendaciones personalizadas</li>
          </ul>

          <img
            class="mt-6 w-full rounded-2xl border border-slate-200 object-cover aspect-[16/9]"
            src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1400&q=80"
            alt="Persona leyendo con laptop"
            loading="lazy"
          />
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
      <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-2">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-white font-bold">B</span>
          <div>
            <p class="font-semibold">Biblioteca</p>
            <p class="text-sm text-slate-600">Conectando lectores con conocimiento.</p>
          </div>
        </div>

        <div class="text-sm text-slate-600">
          <p>Contacto: soporte@biblioteca.com</p>
          <p>Horario: Lun–Vie 8:00–18:00</p>
        </div>
      </div>

      <div class="mt-6 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-slate-500">© <span id="year"></span> Biblioteca. Todos los derechos reservados.</p>
        <p class="text-xs text-slate-400">Diseño responsive con Tailwind + JS vanilla</p>
      </div>
    </div>
  </footer>

  <!-- JS Vanilla: Menú hamburguesa -->
  <script>
    const btnOpen = document.getElementById('btnOpen');
    const mobileMenu = document.getElementById('mobileMenu');

    btnOpen.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.contains('hidden');
      mobileMenu.classList.toggle('hidden');
      btnOpen.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
    });

    // Cerrar menú al seleccionar opción (móvil)
    document.querySelectorAll('#mobileMenu a[href^="#"]').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        btnOpen.setAttribute('aria-expanded', 'false');
      });
    });

    // Año en footer
    document.getElementById('year').textContent = new Date().getFullYear();

    // Si pasan a desktop, asegúrate que el menú móvil quede cerrado
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 768) {
        mobileMenu.classList.add('hidden');
        btnOpen.setAttribute('aria-expanded', 'false');
      }
    });
  </script>
</body>
</html>
