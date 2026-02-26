@extends('layout.auth')

@section('title', 'Login y Registro | Biblioteca')

@section('content')
  <section class="grid gap-6 lg:grid-cols-2">

    {{-- Mensaje de éxito (registro o logout) --}}
    @if (session('success'))
      <div class="lg:col-span-2 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
        {{ session('success') }}
      </div>
    @endif

    <!-- ================= LOGIN ================= -->
    <article class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
      <header class="mb-6">
        <h2 class="text-2xl font-bold">Iniciar sesión</h2>
        <p class="mt-1 text-sm text-slate-600">Accede con tu correo y contraseña.</p>
      </header>

      {{-- Errores generales de LOGIN (bag: login) --}}
      @if ($errors->login->any())
        <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
          <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->login->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Email -->
        <div class="space-y-1">
          <label for="login_email" class="text-sm font-semibold text-slate-800">Email</label>
          <input
            id="login_email"
            name="email"
            type="email"
            autocomplete="email"
            required
            value="{{ old('email') }}"
            placeholder="tu@correo.com"
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          />
          @error('email', 'login')
            <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div class="space-y-1">
          <label for="login_password" class="text-sm font-semibold text-slate-800">Password</label>
          <input
            id="login_password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
            placeholder="••••••••"
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          />
          @error('password', 'login')
            <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <button
          type="submit"
          class="w-full rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700
                 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Entrar
        </button>

        <p class="text-center text-xs text-slate-500">
          ¿No tienes cuenta? Regístrate en el formulario de la derecha.
        </p>
      </form>
    </article>

    <!-- ================= REGISTRO ================= -->
    <article class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
      <header class="mb-6">
        <h2 class="text-2xl font-bold">Registro</h2>
        <p class="mt-1 text-sm text-slate-600">Crea tu cuenta para reservar y gestionar préstamos.</p>
      </header>

      {{-- Errores generales de REGISTRO (bag: register) --}}
      @if ($errors->register->any())
        <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
          <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->register->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nombre -->
        <div class="space-y-1">
          <label for="reg_nombre" class="text-sm font-semibold text-slate-800">Nombre</label>
          <input
            id="reg_nombre"
            name="nombre"
            type="text"
            autocomplete="given-name"
            required
            value="{{ old('nombre') }}"
            placeholder="Tu nombre"
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          />
          @error('nombre', 'register')
            <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email -->
        <div class="space-y-1">
          <label for="reg_email" class="text-sm font-semibold text-slate-800">Email</label>
          <input
            id="reg_email"
            name="email"
            type="email"
            autocomplete="email"
            required
            value="{{ old('email') }}"
            placeholder="tu@correo.com"
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          />
          @error('email', 'register')
            <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password / Repetir -->
        <div class="grid gap-4 sm:grid-cols-2">
          <div class="space-y-1">
            <label for="reg_password" class="text-sm font-semibold text-slate-800">Password</label>
            <input
              id="reg_password"
              name="password"
              type="password"
              autocomplete="new-password"
              required
              placeholder="••••••••"
              class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('password', 'register')
              <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="space-y-1">
            <label for="reg_password2" class="text-sm font-semibold text-slate-800">Repetir password</label>
            <input
              id="reg_password2"
              name="password_confirmation"
              type="password"
              autocomplete="new-password"
              required
              placeholder="••••••••"
              class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('password_confirmation', 'register')
              <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <button
          type="submit"
          class="w-full rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800
                 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
        >
          Crear cuenta
        </button>

        <p class="text-center text-xs text-slate-500">
          Al registrarte aceptas los términos y el aviso de privacidad.
        </p>
      </form>
    </article>
  </section>
@endsection
