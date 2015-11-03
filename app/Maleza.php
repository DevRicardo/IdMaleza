<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maleza extends Model
{
    //
    protected $table = "malezas";



    public function cultivos()

    {

        return $this->belongsToMany('App\Cultivo');

    }




    public function activos()
    {
        return $this->belongsToMany("App\Activo");
    }
}
