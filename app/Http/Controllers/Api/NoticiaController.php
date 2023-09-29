<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use PHPUnit\Framework\Error\Notice;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        $noticias = Noticia::all();
        return response()->json($noticias, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       $novaNoticia = Noticia::create($request->all());
       return response()->json($novaNoticia, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        $noticia = Noticia::find($noticia->id);
        //if(isset($noticia)){
        return response()->json($noticia, 200);
        //}
        //else{
        //    return response()->json("Objeto nao encontrado", 404);
        //}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //dd($noticia);
        //dd($request->all());
        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->save();

        return response()->json($noticia, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        Noticia::destroy($noticia->id);

        return response()->json("Objeto Excluido", 200);
        //return response()->noContent();
    }
}
