<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    //

    public function malezas()

    {

        return $this->belongsToMany('App\Maleza');

    }

}
