<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    //
    protected $table = "master_satker";

    public function satker(){
        return $this->belongsTo('App\Pegawai');
    }
}
