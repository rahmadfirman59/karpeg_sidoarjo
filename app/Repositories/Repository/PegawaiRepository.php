<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 11/03/20
 * Time: 12.32
 */

namespace App\Repositories\Repository;
use App\Pegawai;
use App\Repositories\Interfaces\PegawaiRepositoryInterfaces;
use Illuminate\Support\Facades\DB;

class PegawaiRepository implements PegawaiRepositoryInterfaces
{

    public function index(){
        $data = Pegawai::paginate(10);

        return $data;
    }


    public function search($request){
        $nip = $request->nip;
        if (!empty($nip)){
            $data = Pegawai::where('Nip','=',$nip)->paginate(5);
        }
        return $data;

    }

}