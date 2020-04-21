<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Repositories\Repository\AndroidRepository;
use App\Repositories\Repository\AppRepository;
use Illuminate\Http\Request;

class AndroidController extends Controller
{
    //


    /**
     * @var AndroidRepository
     */
    private $androidRepository;


    public function __construct(AndroidRepository $androidRepository)
    {
        $this->androidRepository = $androidRepository;

    }

    public function login(Request $request){
        $data = $this->androidRepository->login($request);
        return json_encode($data);
    }


    public function data_cuti($nip){
        $data = $this->androidRepository->data_cuti($nip);
        return  json_encode($data);
    }

    public function  status_cuti($nip){
        $data = $this->androidRepository->status_cuti($nip);
        return json_encode($data);
    }


    public function download_surat($id){
        $data = $this->androidRepository->download_surat($id);

        return json_encode($data);
    }


    public function upload_photo(Request $request){
        $action  = $this->androidRepository->upload_photo($request);

        return json_encode($action);

    }

    public function save_password(Request $request){
        $data = $this->androidRepository->save_password($request);
        return json_encode($data);
    }


    public function kartu_depan($nip){
        $data = Foto::find($nip);
        return $data->gambar_depan;
    }
    public function kartu_belakang($nip){
        $data = Foto::find($nip);
        return $data->gambar_belakang;
    }
}
