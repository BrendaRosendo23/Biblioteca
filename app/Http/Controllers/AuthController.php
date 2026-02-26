<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    
    public function register(Request $request)
    {
        $validated = $request->validate([
        'nombre'   => ['required', 'string', 'max:255'],
        'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
        'name'     => $validated['nombre'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']),
        'user_type' => 'user', // Asignamos un tipo de usuario por defecto, puedes modificar esto según tus necesidades
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Cuenta creada');
    }

   public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home'); // <- evita route() por ahora
        }

        return back()
            ->withErrors(['email' => 'Las credenciales no son correctas.'], 'login')
            ->onlyInput('email');

    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','Has cerrado sesion exitosamente.');
        
    }

}
