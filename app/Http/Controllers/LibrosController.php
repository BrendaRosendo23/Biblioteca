<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Libro;


use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn'=> 'required|string|max:20|unique:libros,isbn',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categoria' => 'required|exists:categorias,id',
        ]);

        // Crear un nuevo libro con los datos validados
        $libro = new Libro();
        $libro->titulo = $validatedData['titulo'];
        $libro->isbn = $validatedData['isbn'];
        $libro->autor = $validatedData['autor'];
        $libro->editorial = $validatedData['editorial'];
        $libro->categoria_id = $validatedData['categoria'];
        $libro->save();

        // Redirigir a la lista de libros o mostrar un mensaje de éxito
        return redirect()->route('home')->with('success', 'Libro creado exitosamente.');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Categoria::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn'=> 'required|string|max:20|unique:libros,isbn,' . $id,
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categoria' => 'required|exists:categorias,id',
        ]);
        // Encontrar el libro existente y actualizar sus datos
        $libro = Libro::findOrFail($id);
        $libro->titulo = $validatedData['titulo'];
        $libro->isbn = $validatedData['isbn'];
        $libro->autor = $validatedData['autor'];
        $libro->editorial = $validatedData['editorial'];
        $libro->categoria_id = $validatedData['categoria'];
        $libro->save();
        // Redirigir a la lista de libros o mostrar un mensaje de éxito
        return redirect()->route('home')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('home')->with('success', 'Libro eliminado exitosamente.');
    }

}
