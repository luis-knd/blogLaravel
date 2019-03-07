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

Route::post('/noticia', function (Illuminate\Http\Request $request) {
    $id = substr(md5(microtime()), 0, 4);
    $titulo = $request->input('titulo');
    $cuerpo = $request->input('cuerpo');

    $entrada = array('id' => $id, 'titulo' => $titulo, 'cuerpo' => $cuerpo);

    session([$id => $entrada]);

    return route('noticia.show', ['id' => $id]);
})->name('noticia.store');

Route::get('/noticia/{id}', function ($id) {
    $noticia = session()->get($id);
    $titulo = $noticia['titulo'];
    $cuerpo = $noticia['cuerpo'];

    return '<h1>' . $titulo . '</h1><br><p>' . $cuerpo . '</p>';
})->name('noticia.show');