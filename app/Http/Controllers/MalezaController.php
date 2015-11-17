<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Maleza;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
        return view("maleza.create");

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
        $maleza = new Maleza();
        $maleza->nombre_comun = $request->nombre_comun;
        $maleza->nombre_cientifico = $request->nombre_cientifico;
        $maleza->familia = $request->familia;
        $maleza->detalle = $request->detalle;
        $maleza->save();

        Session::flash("mensaje",["contenido"=>"Registro Correcto", "color" => "green"]);
        return redirect()->back();
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

        return view("maleza.new_maleza")->with("parametros",array("malezas"=>$malezas))->with("id_maleza",Session::get("id_maleza"));

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
        Session::flash("mensaje",["contenido"=>"Registro Correcto", "color" => "green"]);
        Session::flash("id_maleza",$maleza);
        return redirect("/maleza/imagen?id=".$maleza);


    }

    public function eliminar($id){

        $foto = Foto::find($id);
        $foto->delete();


        Session::flash("mensaje",["contenido"=>"La foto se elimino con exito", "color" => "green"]);
        return redirect()->back();
    }
}
