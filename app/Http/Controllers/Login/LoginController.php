<?php

namespace App\Http\Controllers\Login;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("login.acceso");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login.registro');
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
            "full_nombre"=>"required|unique:usuarios",
            "email"=>"required|unique:usuarios|email",
            "pais"=>"required",
            "departamento"=>"required",
            "ciudad"=>"required",
            "clave"=>"required|max:30",
            "conf_vlave"=>"same:clave",
        );

        if($request->ajax()){

            $validacion  = Validator::make($request->all(), $conditions);
            if(!$validacion->fails()){


                $usuario = new Usuario();
                $usuario->full_nombre = $request->full_nombre;
                $usuario->email = $request->email;
                $usuario->clave =  Hash::make($request->clave);
                $usuario->pais = $request->pais;
                $usuario->departamento = $request->departamento;
                $usuario->ciudad = $request->ciudad;
                $usuario->rol = 0;
                $guardado = $usuario->save();

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


    public function autenticar(Request $request)
    {


       if($this->authAux($request))
        {
            return redirect("cultivo");

        }else
        {
            return redirect()->back();
        }


    }


    public function authAux(Request $request){

        $email = $request->email;
        $clave_usuario = $request->clave;

        $usuario = Usuario::where("email",$email)->get();

        $clave = "";
        foreach($usuario AS $var){
            Session::put('id',$var->id );
            Session::put('full_nombre',$var->full_nombre );
            Session::put('email', $var->email);
            Session::put('rol', $var->rol);

            $clave = $var->clave;
        }

        if(empty($clave)){
             return false;
        }
        $claveValida = Hash::check($clave_usuario, $clave );

        if($claveValida){
            return true;
        }else{
            return false;
        }



    }

    public function logout(){
        //
        Session::flush();
        return redirect('/');
    }
}
