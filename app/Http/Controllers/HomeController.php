<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        if ($user->user_type === 'admin') {
           
            $libros = Libro::paginate(4); // Obtener todos los libros y paginarlos
            $total_Libros = Libro::count(); // Contar el total de libros
            $libros_prestados = Libro::where('estatus', 1)->count(); // Contar los libros prestados
            $total_usuarios = User::count(); // Contar el total de usuarios
            $devoluciones_pendientes = Prestamo::where('estado', 'pendiente')->count(); // Contar las devoluciones pendientes

            return view('home.home', compact('libros', 'total_Libros', 'libros_prestados', 'total_usuarios', 'devoluciones_pendientes'));
        
            } else {
            return view('home.index_user');
        }

    }


}
