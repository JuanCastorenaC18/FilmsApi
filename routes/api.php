<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', CategoryController::class);
Route::resource('directors', DirectorController::class);
Route::resource('movies', MovieController::class);


Route::get('prueba', function () {
    return ['mensaje' => 'Comunicación exitosa entre la API y Insomnia'];
});

Route::get('hola', [QueryController::class, 'hola']);
// Ruta para la consulta de título y duración
Route::get('/films/cartelera', [QueryController::class, 'consultaTituloDuracion']);

// Ruta para la consulta detallada
Route::get('/films/pelicula/{id}', [QueryController::class, 'consultaDetallada']);
//Route::get('/films/peliculas/{id}', [TuControlador::class, 'consultaDetallada']);

Route::get('/films/peliculas', [QueryController::class, 'consultaDetalladaAll']);
//Route::get('/films/peliculas/{id}', [TuControlador::class, 'consultaDetallada']);


/*Route::group(['prefix' => 'api'], function () {
    // Ruta para el método hola
    Route::get('/hola', [QueryController::class, 'hola']);

    // Ruta para la consulta de título y duración
    Route::get('/consultasimple', [QueryController::class, 'consultaTituloDuracion']);

    // Ruta para la consulta detallada
    Route::get('/consulta-detallada', [QueryController::class, 'consultaDetallada']);
});*/



Route::get('/movies/{id}/with-details', function ($id) {
    $movie = Movie::with('category', 'director')->find($id);
    return response()->json($movie);
});

Route::get('/test-movie-relationships', function () {
    $movie = Movie::with('category', 'director')->find(1); // Reemplaza "1" con el ID de la película que deseas probar
    return response()->json($movie);
});