<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 12/03/20
 * Time: 09.57
 */

namespace App\Repositories\Repository;

use App\Foto;
use App\Pegawai;
use App\Repositories\Interfaces\CetakKartuRepositoryInterfaces;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use test\Mockery\ReturnTypeObjectTypeHint;



class CetakKartuRepository implements CetakKartuRepositoryInterfaces
{
    public function index($request){

        $data = DB::table('master_pegawai')
            ->select('master_pegawai.Nama','master_pegawai.Photo','master_pegawai.Nip','master_satker.Nama as NamaSatker','mst_foto.Foto1 as Photo')
            ->join('master_satker','master_pegawai.Uker','=','master_satker.Uker')
            ->leftJoin('mst_foto','master_pegawai.Nip','=','mst_foto.Nip')
            ->when($request->keyword,function ($query) use ($request){
                $query->where("{$request->filter}","like","%{$request->keyword}%")
                    ->orderBy('Nip','asc');
            })->paginate($request->limit ? $request->limit : 10);
        $data->appends($request->only('filter','keyword'));

        return $data;
    }


    public function upload_photo($request){

        $tujuaan_upload = ('public/upload/foto');
        $image_array_1 = explode(";", $request->image);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = $request->nip . '.png';
        file_put_contents($tujuaan_upload.'/'.$imageName, $data);
        $save = Foto::find($request->nip);
        $data = file_get_contents($tujuaan_upload.'/'.$imageName);


        if ($save)
        {
            $save->Foto1 = $data;
            $save->save();

            return  'ubah';
        }
        else {
            $save  = new Foto();
            $save->Nip = $request->nip;
            $save->Foto1 = $data;
            $save->save();

            return 'tambah';

        }

    }


    public function cetak_depan ($nip) {
        $pegawai = DB::table('master_pegawai')
            ->select('master_pegawai.Nama','master_pegawai.Nip','mst_foto.Foto1 as photo')
            ->leftJoin('mst_foto','master_pegawai.Nip','=','mst_foto.Nip')
            ->where('master_pegawai.Nip','=',$nip)
            ->first();

        return $pegawai;
    }


    public function cetak_belakang($nip){
        return $nip;
    }

    public function simpan_gambar_depan($request){

        $data = DB::table('mst_foto')
            ->where('Nip','=',$request->nip)
            ->update(['gambar_depan'=>$request->image]);
        if ($data) {
            return 'ok';
        }
    }

    public function simpan_gambar_belakang($request){
        $data = DB::table('mst_foto')
            ->where('Nip','=',$request->nip)
            ->update(['gambar_belakang'=>$request->image]);
        if ($data) {
            return 'ok';
        }
    }






}