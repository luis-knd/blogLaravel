<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function store(Illuminate\Http\Request $request)
    {
        $id     = substr(md5(microtime()), 0, 4);
        $titulo = $request->input('titulo');
        $cuerpo = $request->input('cuerpo');

        $entrada = array('id' => $id, 'titulo' => $titulo, 'cuerpo' => $cuerpo);

        session([$id => $entrada]);

        return route('noticia.show', ['id' => $id]);
    }
}
