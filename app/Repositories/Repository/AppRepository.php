<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 10/03/20
 * Time: 11.41
 */

namespace App\Repositories\Repository;

use App\Pegawai;
use App\Repositories\Interfaces\AppRepositoryInterfaces;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\DB;

class AppRepository implements AppRepositoryInterfaces
{

    public function login_proses($data){

        $username = $data->username;
        $password = $data->password;
        $user = User::where('username',$username)->first();
        if (!empty($user)){
            if (decrypt($user->password) == $password){
                $back['status_code'] = 200;
                $back['message_title']  = "Login Berhasil!!!";
                $back['message_type'] = 'success';
                $back['message'] = "Welocme Admin";
                $back['session'] = $user;
               }else{
                $back['status_code'] = 422;
                $back['message_title']  = "Login Gagal!!!";
                $back['message_type'] = 'error';
                $back['message'] = "Password Salah";
               }
       }else{
            $back['status_code'] = 422;
            $back['message_title']  = "Login Gagal!!!";
            $back['message_type'] = 'error';
            $back['message'] = "Username Salah";

        }

        return $back;
    }

    public function cari_pegawai($nip){
        $data = DB::table('master_pegawai')
            ->select('master_pegawai.*','kode_agama.Agama as nama_agama','master_satker.Nama as nama_satker')
            ->leftJoin("kode_agama",'master_pegawai.Agama','=','kode_agama.Kode')
            ->leftJoin("master_satker",'master_pegawai.Uker','=','master_satker.Uker')
            ->where('Nip', 'LIKE', '%'.$nip.'%')
            ->first();
        if ($data->Jabatan != ''){
            $jabatan = DB::table('mst_jabatan')->where('Cntr','=',$data->Jabatan)->first();
            if (isset($jabatan)){
                $data->nama_jabatan =$jabatan->Nama ;
            }else{
                $data->nama_jabatan ='' ;
            }
        }else{
            $data->nama_jabatan = 'Kosong';
        }

        return $data;
    }

    public function save_password($request){
        try{
            $data = User::find($request->id);
            $data->password = encrypt($request->password);
            $data->save();

            return 'Password berhasil diganti';
        }catch (\Exception $e){
            return $e;
        }




    }



}