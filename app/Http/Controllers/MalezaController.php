<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Maleza;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MalezaController extends Controller
{
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


    public function cargarImagenes(Request $request)
    {

        $malezas = Maleza::all();

        return view("maleza.new_maleza")->with("parametros",array("malezas"=>$malezas));

    }


    public function addfoto(Request $request){

        $dir = "img/maleza";
        $maleza = $request->maleza;
        $tipo = $request->tipo;
        $imagenes = $request->file();

        foreach($imagenes AS $imagen){

            $nuevo_nombre = $this->uploadImagen($imagen, $dir);
            if( is_file($dir."/".$nuevo_nombre) ) {
                $foto = new Foto();
                $foto->ruta = $dir."/".$nuevo_nombre;
                $foto->maleza_id = $maleza;
                $foto->tipo = $tipo;
                $foto->save();
            }
        }

        return redirect("/maleza/imagen");


    }
}
