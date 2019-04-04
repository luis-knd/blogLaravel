<?php

namespace Blog\Http\Controllers\Backend;

use Blog\Factories\NoticiaFactory;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado = NoticiaFactory::generarNoticias(20);
        return view('backend.noticia.index', ['listado' => $listado]);
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
     * @param \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $id     = substr(md5(microtime()), 0, 4);
        $titulo = $request->input('titulo');
        $cuerpo = $request->input('cuerpo');

        $entrada = array('id' => $id, 'titulo' => $titulo, 'cuerpo' => $cuerpo);

        session([$id => $entrada]);

        return route('backend.noticia.show', ['id' => $id]);
    }
    
    public function show($id){
        $noticia    = (object) array(
            'titulo'=> 'Titulo de la noticia',
            'cuerpo'=> 'Cuerpo de la noticia',
            'id'    => $id
        );
        return view('backend.noticia.show' , ['noticia' => $noticia]);
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
