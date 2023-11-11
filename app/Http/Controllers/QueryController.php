<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Director;

use Illuminate\Http\Request;

class QueryController extends Controller
{

    public function hola()
    {
        return '¡Hola!';
    }

    public function consultaTituloDuracion()
    {
        // Utiliza el modelo Movie para realizar la consulta
        $result = Movie::select('titulo', 'duracion', 'imagen')->get();
        return response()->json($result);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }

    public function director()
    {
        return $this->belongsTo(Director::class, 'id_director', 'id_director');
    }


    public function consultaDetallada($id)
    {
        // Buscar la película por su ID con las relaciones 'director' y 'category'
        $movie = Movie::with('director', 'category')->find($id);

        if (!$movie) {
            // Si la película no se encuentra, devolver una respuesta adecuada
            return response()->json(['error' => 'Película no encontrada'], 404);
        }

        // Formatear la película encontrada
        $formattedMovie = [
            'titulo' => $movie->titulo,
            'duracion' => $movie->duracion,
            'sinopsis' => $movie->sinopsis,
            'imagen' => $movie->imagen,
            'category' => $movie->category->categoria,
            'director' => $movie->director->director,
        ];

        return response()->json($formattedMovie);
    }


    public function consultaDetalladaAll()
    {
        // Obtener todas las películas con las relaciones 'director' y 'category'
        $movies = Movie::with('director', 'category')->get();

        if ($movies->isEmpty()) {
            // Si no se encuentran películas, devolver una respuesta adecuada
            return response()->json(['error' => 'No se encontraron películas'], 404);
        }

        // Formatear las películas encontradas
        $formattedMovies = [];

        foreach ($movies as $movie) {
            $formattedMovie = [
                'titulo' => $movie->titulo,
                'duracion' => $movie->duracion,
                'sinopsis' => $movie->sinopsis,
                'imagen' => $movie->imagen,
                'category' => $movie->category->categoria,
                'director' => $movie->director->director,
            ];

            $formattedMovies[] = $formattedMovie;
        }

        return response()->json($formattedMovies);
    }



    /*public function consultaDetallada()
    {
        $movies = Movie::with('director', 'category')->get();

        $formattedMovies = $movies->map(function ($movie) {
            return [
                'titulo' => $movie->titulo,
                'duracion' => $movie->duracion,
                'sinopsis' => $movie->sinopsis,
                'category' => $movie->category->categoria,
                'director' => $movie->director->director,
            ];
        });

        return response()->json($formattedMovies);
    }*/



        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
