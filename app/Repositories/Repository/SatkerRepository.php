<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 11/03/20
 * Time: 16.08
 */

namespace App\Repositories\Repository;


use App\Repositories\Interfaces\SatkerRepositoryInterfaces;
use App\Satker;

class SatkerRepository implements SatkerRepositoryInterfaces
{
    public function index(){
        $data = Satker::paginate(10);
        return $data;
    }



    public function search($request){

        $satker = $request->satker;

        if (!empty($satker)){
            $data = Satker::where('nama','like','%'.$satker.'%')->paginate(30);
        }
        return $data;

    }
}