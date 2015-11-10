<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Cultivo;
use App\Maleza;
use App\Medida;
use App\Semana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $maleza = $request->maleza;
        $cultivo = $request->cultivo;

        $semanas = Semana::where("cultivo_id",$cultivo)->get();
        $maleza = Maleza::find($maleza);
        $activos = $maleza->activos()->get();




        return view("medida.index")->with("parametros",["semanas"=> $semanas, "activos"=>$activos]);
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

        $reglas = array(
            "imagen" => "mimes:jpeg,png",
            "activo" => "required",
            "semana_id" => "required|unique:medidas",

        );
        $format_result = array("error"=>"null", "datos"=>"");

        $validar = Validator::make($request->all(), $reglas);

        $fecha_medida = date("Y-m-d-i-s");
        $dir = "img/medidas";
        $imagen = $request->file("imagen");
        $activo = $request->activo;
        $observacion = $request->observacion;
        $semana = $request->semana_id;

        if($validar->fails()){

            $format_result["error"] = $validar->errors()->all();
            return json_encode(array($format_result));
        }

        $nuevo_nombre = $this->uploadImagen($imagen,$dir);


        if(is_file($dir."/".$nuevo_nombre)){

            $medida = new Medida();
            $medida->fecha_muestra = $fecha_medida;
            $medida->foto_muestra = $dir."/".$nuevo_nombre;
            $medida->activo_aplicado = $activo;
            $medida->comentario = $observacion;
            $medida->semana_id = $semana;
            $medida->save();


        }

        $format_result["datos"] = array("Registro exitoso");

        return json_encode(array($format_result));




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
