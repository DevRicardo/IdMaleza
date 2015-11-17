<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    //
    protected $table = "activos";


    public function malezas()

    {

        return $this->belongsToMany('App\Maleza',"activo_maleza","activo_id","maleza_id");

    }




}
