<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 09/04/20
 * Time: 07.48
 */

namespace App\Repositories\Repository;

use  App\User;
use Illuminate\Support\Facades\DB;


class AndroidRepository
{
    public function login($data){
        $username = $data->username;
        $password = $data->password;
        $user = User::where('username',$username)->first();

        if (!empty($user)){
            if (decrypt($user->password) == $password){

                $data = file_get_contents('http://cuti.sidoarjokab.go.id/api_login.php?NIP='.$user->username);
                $pecah =  json_decode($data);

                $back['error'] = 'false';
                $back['code'] = 200;
                $back['message'] = "Welocme";
                $back['data'] = $pecah;

            }else{
                $back['error'] = 'true';
                $back['code'] = 422;
                $back['message'] = "Password Salah";


            }
        }else{
            $back['error'] = 'true';
            $back['code'] = 422;
            $back['message'] = "Usernmae Salah";

        }

        return $back;
    }

    public function data_cuti($nip){
        $data = file_get_contents('http://cuti.sidoarjokab.go.id/api_data_cuti.php?nip='.$nip);

        if ($data){
            $pecah = json_decode($data);
            $back['error'] = 'false';
            $back['code'] = 200;
            $back['message'] = "Berhasil";
            $back['list'] = $pecah;
        }else
        {
            $back['error'] = 'true';
            $back['code'] = 422;
            $back['message'] = "Data Kosong";
        }

        return $back;
    }


    public function status_cuti($nip){
        $data = file_get_contents('http://cuti.sidoarjokab.go.id/api_status_cuti.php?nip='.$nip);
        if ($data){
            $pecah = json_decode($data);
            $back['error'] = 'false';
            $back['code'] = 200;
            $back['message'] = "Berhasil";
            $back['list'] = $pecah;
        }else
        {
            $back['error'] = 'true';
            $back['code'] = 422;
            $back['message'] = "Data Kosong";
        }

        return $back;
    }


    public function download_surat($id){
        $data = file_get_contents('http://cuti.sidoarjokab.go.id/surat_cuti.php?id='.$id);

        if ($data){
            $back['error'] = 'false';
            $back['code'] = 200;
            $back['message'] = "Berhasil";
            $back['data'] =$data;
        }else
        {
            $back['error'] = 'true';
            $back['code'] = 422;
            $back['message'] = "Data Kosong";
        }

        return $back;
    }


    public function upload_photo($request){
        return 'ok';
    }
}