<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 10/03/20
 * Time: 11.41
 */

namespace App\Repositories\Repository;

use App\Repositories\Interfaces\AppRepositoryInterfaces;
use Illuminate\Support\Facades\Session;
use App\User;

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



}