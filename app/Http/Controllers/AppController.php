<?php

namespace App\Http\Controllers;

use App\Repositories\Repository\AppRepository;
use App\Repositories\Interfaces\AppRepositoryInterfaces;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class AppController extends Controller
{


    /**
     * @var AppRepository
     */
    private $appRepository;

    public function __construct(AppRepositoryInterfaces $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function index(){
        return view('login');
    }

    public function login_proses(Request $request){

        $messeage_requires = [
            'username.required'=>"Username Tidak Boleh Kosong",
            'password.required'=>"Password Tidak Boleh Kosong"
        ];

        $this->validate($request,[
            'username'=> 'required',
            'password'=> 'required',
        ],$messeage_requires);


       $login = $this->appRepository->login_proses($request);

       if ($login['status_code'] == 200){
           Session::put('useractive',$login['session']);
           return redirect('/dashboard')
                ->with('message_title',$login['message_title'])
                ->with('message_type', $login['message_type'])
                ->with('message',$login['message']);
       }elseif ( $login['status_code'] == 422){
           return redirect('/login')
               ->with('message_title',$login['message_title'])
               ->with('message_type', $login['message_type'])
               ->with('message',$login['message']);
       }
    }


    public function dashboard(){
        return view('page.dashboard');
    }



    public function logout(){


        Session::forget('useractive');
        return redirect('login')
            ->with('message_title','Logout Berhasil!!!')
            ->with('message_type','success')
            ->with('message','Goodbye, Administrator');
    }
}
