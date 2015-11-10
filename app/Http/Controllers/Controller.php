<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $id_usuario;

    public function __construct(){
         $this->id_usuario = Session::get("id");
    }


    public function getUsuario(){
        return $this->id_usuario;
    }


    public function startOfendWeek($fecha){
        $dt = Carbon::parse($fecha);
        $date = $dt->startOfWeek();

        return $date;

    }

    public function calcularSemanas( $inicio_cultivo, $numero_semans){

        $date_inici_cultivo = Carbon::parse($inicio_cultivo);
        $array_fechas_semana  = array();

        for($i = 1; $i <= $numero_semans; $i++){
            $week = $date_inici_cultivo->addWeek(1);
            $fin = $week->toDateString();
            $inicio = $this->restarWeek($fin) ;
            $array_fechas_semana[$i] = array("inicio"=>$inicio,"fin"=>$fin);
        }

        return $array_fechas_semana;

    }

    public function restarWeek($fecha){
        $date_fin_semana = Carbon::parse($fecha);

        return $date_fin_semana->subWeek()->toDateString();
    }


    public function semanaActual($incicio_cultivo, $fecha_actual){
        $dt = Carbon::parse($incicio_cultivo);
        $dt2 = Carbon::parse($fecha_actual);
        $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
            return $date->getWeekendDays();
        }, $dt2);
        return ceil($daysForExtraCoding/7);
    }

    public function uploadImagen($file,$dir){

        $ext            = $file->getClientOriginalExtension();
        $name           = $file->getClientOriginalName();
        $hash           = md5($name);
        $nuevo_nombre = $hash.'.'.$ext;

        $file->move($dir,$nuevo_nombre);


        return $nuevo_nombre;

    }


}
