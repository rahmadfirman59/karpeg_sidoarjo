<?php

namespace App\Http\Controllers;

use App\Perkawinan;
use Illuminate\Http\Request;

class PengajuanPerkawinan extends Controller
{
    //

    public function index(){
        $data = Perkawinan::paginate(10);

        return view('page.pengajuan_kawin.index')
            ->with('data',$data);
    }
}
