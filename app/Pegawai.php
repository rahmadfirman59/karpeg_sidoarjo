<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = "master_pegawai";


    public function satker(){
        return $this->hasOne('App\Satker');
    }

}
