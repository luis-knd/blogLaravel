<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| rutas las carga dentro de un grupo RouteServiceProvider que
| Contiene el grupo de middleware "web". ¡Ahora crea algo genial!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola-mundo', function () {
    return 'Hola Mundo';
})->name('decir hola');

Route::namespace('Backend')->name('backend.')->prefix('/backend')->group(function () {
    Route::resource('noticia', 'NoticiaController');
    Route::resource('categorias', 'CategoriaController');
});

Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::post('/noticia', 'NoticiaController@store')->name('noticia.store');
    Route::get('/noticia/{id}', 'NoticiaController@show')->name('noticia.show');
});
