<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Maleza;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $malezas = Maleza::paginate(5);

        return view("admin.index")->with("malezas",$malezas);
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
        $maleza = Maleza::find($id);
        return view("maleza.edit")->with("maleza", $maleza);
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

        $maleza = Maleza::find($id);
        $maleza->nombre_comun = $request->nombre_comun;
        $maleza->nombre_cientifico = $request->nombre_cientifico;
        $maleza->familia = $request->familia;
        $maleza->detalle = $request->detalle;
        $maleza->save();
        Session::flash("mensaje",["contenido"=>"Actualizado Correctamente", "color" => "green"]);


        return redirect()->back();
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

        $maleza = Maleza::find($id);
        $maleza->delete();
        Session::flash("mensaje",["contenido"=>"Eliminada Correctamente", "color" => "green"]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fotos($id)
    {
        $maleza = Maleza::find($id);
        $fotos = $maleza->fotos()->get();
        Session::flash("id_maleza",$maleza->id);
        return view("admin.maleza_fotos")->with("fotos",$fotos)->with("nombre",$maleza->nombre_comun);
    }

    public function activos($id){


        $activos_disponibles = Activo::paginate(5);

        $malza = Maleza::find($id);
        $activos = $malza->activos()->paginate(5);


//dd($activos_disponibles);
        Session::flash("id_maleza",$id);
        return view("admin.activos")
            ->with("disponibles", $this->excluir($activos_disponibles,$activos))
            ->with("asociado",$activos);
    }

    public function asociar($id_activo, $id_maleza){

        /*$maleza = Maleza::find($id_maleza);

        $maleza->activos()->attach($id_activo);*/

        $activo = Activo::find($id_activo);
        $activo->malezas()->attach($id_maleza);

        Session::flash("mensaje",["contenido"=>"Registro Correcto", "color" => "green"]);
        return redirect()->back();


    }


    public function desasociar($id_activo, $id_maleza){

        /*$maleza = Maleza::find($id_maleza);

        $maleza->activos()->attach($id_activo);*/

        $activo = Activo::find($id_activo);
        $activo->malezas()->detach($id_maleza);

        Session::flash("mensaje",["contenido"=>"Registro Correcto", "color" => "green"]);
        return redirect()->back();


    }


    public function excluir($disponibles, $asociados){
        $contador = 0;
        foreach($disponibles AS $disponible){

            foreach($asociados AS $asociado){

                if($disponible->id == $asociado->id){

                    unset($disponibles[$contador]);
                }

            }
            $contador++;
        }

        return $disponibles;
    }



    public function nueva(Request $request){


        return view("maleza.create");
    }
}
