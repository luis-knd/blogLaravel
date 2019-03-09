<?php

namespace Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $id     = substr(md5(microtime()), 0, 4);
        $titulo = $request->input('titulo');
        $cuerpo = $request->input('cuerpo');

        $entrada = array('id' => $id, 'titulo' => $titulo, 'cuerpo' => $cuerpo);

        session([$id => $entrada]);

        return route('frontend.noticia.show', ['id' => $id]);
    }

    public function show($id){
        $noticia    = session()->get($id);
        $titulo     = $noticia['titulo'];
        $cuerpo     = $noticia['cuerpo'];

        return '<h1>' . $titulo . '</h1><br><p>' . $cuerpo . '</p>';
    }
}
