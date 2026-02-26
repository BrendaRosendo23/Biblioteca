<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Acceso | Biblioteca')</title>
  <!-- Tailwind CSS (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Fuente opcional -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    html { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
  </style>

  @stack('head')
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
  @if(!empty($noAuthShell))
    @yield('content')
  @else
    <main class="mx-auto max-w-6xl px-4 py-10 sm:py-14">
      <header class="mb-8 text-center">
        <h1 class="text-3xl font-bold">Biblioteca</h1>
        <p class="mt-2 text-slate-600">Inicia sesión o crea una cuenta.</p>
      </header>

      @yield('content')

      @include('partials.auth.footer')
    </main>
  @endif
  @stack('scripts')
</body>
</html>
