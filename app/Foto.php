<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = "fotos";


    public function maleza(){
        return $this->belongsTo("App\Maleza");
    }


}
