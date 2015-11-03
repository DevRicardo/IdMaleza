<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Maleza;
use App\Semana;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CultivoController extends Controller
{


    private $numero_semanas;

    public function __construct(){
        parent::__construct();
        $this->middleware('guest');
        $this->numero_semanas = 12;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $historico = $request->h;
        $activo = 1;
        if($historico == 1){
            $activo = 0;
        }

        $cultivos = Cultivo::all()->where("estado_cultivo",$activo);
        $incio_cultivo = "";
        $semanas_total = "";
        $semana_actual = "";
        $fecha_actual = date("Y-m-d");


        foreach($cultivos AS $cultivo){
            $incio_cultivo = $cultivo->fecha_inicio;

        }

        if($incio_cultivo != ""){
            $semana_actual = $this->semanaActual($fecha_actual,$incio_cultivo);
            $semanas_total = $this->calcularSemanas($incio_cultivo, $this->numero_semanas);

        }



        return view("cultivo.index")->with("cultivos", $cultivos)->with("semana", $semana_actual);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cultivo = Cultivo::where("estado_cultivo",1)->get();
        $id = "";
        foreach($cultivo AS $valor){
            $id = $valor->id;
        }

        if(!empty($id)){
            return redirect("/errorcultivo");
        }

        $malezas = Maleza::all();

        return view("cultivo.crear")->with("malezas",$malezas);
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

        $format_result = array("error"=>"null", "datos"=>"");

        $conditions = array(
            "tipo"=>"required",
            "ubicacion"=>"required",
            "tamano"=>"required|numeric",
            "origen"=>"required",
            "suelo"=>"required",
            "anterior"=>"required",
            "maleza"=>"required",
            "activo"=>"required"
        );

        if($request->ajax()){

            $validacion  = Validator::make($request->all(), $conditions);
            if(!$validacion->fails()){


                $cultivo = new Cultivo();
                $cultivo->tipo = $request->tipo;
                $cultivo->ubicacion = $request->ubicacion;
                $cultivo->tamano = $request->tamano;
                $cultivo->origen = $request->origen;
                $cultivo->suelo = $request->suelo;
                $cultivo->anterior = $request->anterior;
                $cultivo->estado_cultivo = 1;
                $cultivo->usuario_id = $this->getUsuario();
                $cultivo->maleza = $request->maleza;
                $cultivo->activo = $request->activo;
                $cultivo->fecha_activo = "NO";
                $guardado = $cultivo->save();

                if(!$guardado){
                    $format_result['error'] = array("No se pudo registrar el usuario");
                }else{
                    $format_result["datos"] = array("Registro exitoso");
                }
                return json_encode(array($format_result));

            }else{
                $format_result["error"] = $validacion->errors()->all();
                return json_encode(array($format_result));
            }
        }
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
        $cultivos = Cultivo::find($id)->get();
        $incio_cultivo = "";
        $semanas_total = "";
        $semana_actual = "";
        $fecha_actual = date("Y-m-d");
        $cultivo = "";



        foreach($cultivos AS $valor){
            $incio_cultivo = $valor->fecha_inicio;
            $cultivo = $valor;

        }


        if($incio_cultivo != ""){
            $semana_actual = $this->semanaActual($fecha_actual,$incio_cultivo);
            $semanas_total = $this->calcularSemanas($incio_cultivo, $this->numero_semanas);

        }

        $cultivo_m = Cultivo::find($cultivo->id);
        $malezas = $cultivo_m->malezas()->get();



        return view("cultivo.mostrar")
            ->with("cultivo", $cultivo)
            ->with("semana", array($semana_actual,$semanas_total,$malezas));
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



    public function iniciar($id){

        $fecha  =date("Y-m-d");
        $cultivo = Cultivo::find($id);
        $cultivo->fecha_inicio = $fecha;
        $cultivo->estado_cultivo = 1;
        $cultivo->save();


        //calcular semanas
        $semanas_total = $this->calcularSemanas($fecha, $this->numero_semanas);
        // creamos la lista de semanas

        $semana = Semana::where("cultivo_id",$id)->get();

        if(empty($semana[0])){

            foreach($semanas_total AS $index => $valor){
                $semanas = new Semana();
                $semanas->semana = $index;
                $semanas->inicio_semana = $valor["inicio"];
                $semanas->fin_semana = $valor["fin"];
                $semanas->estado_cultivo = 1;
                $semanas->cultivo_id = $id;
                $semanas->save();
            }

        }

        return redirect()->back();

    }


    public function terminar($id){

        $cultivo = Cultivo::find($id);
        $cultivo->estado_cultivo = 0;
        $cultivo->save();

        return redirect("/cultivo");

    }


    public function aplicar($id){

        $cultivo = Cultivo::find($id);
        $cultivo->fecha_activo = date("Y-m-d");
        $cultivo->save();

        return redirect()->back();

    }


    public function nuevaMaleza($id_maleza,$id_cultivo){

        $cultivo = Cultivo::find($id_cultivo);
        $cultivo->malezas()->attach($id_maleza);


    }
}
