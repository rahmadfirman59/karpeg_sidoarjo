<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Repositories\Repository\CetakKartuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakKartuController extends Controller
{
    //

    /**
     * @var CetakKartuRepository
     */
    private $cetakKartuRepository;

    public function __construct(CetakKartuRepository $cetakKartuRepository)
    {
        $this->cetakKartuRepository = $cetakKartuRepository;
    }

    public function index(Request $request){
        $pegawai = $this->cetakKartuRepository->index($request);

        return view('page.cetak.index')
            ->with('pegawai',$pegawai)
            ->with('keyword',$request->keyword)
            ->with('filter',$request->filter);
    }

    public function take_photo($par=''){
        $nip = $par;

        return view('page.cetak.take')
            ->with('nip', $nip);
    }

    public function upload_photo($par=""){
        $nip = $par;


        return view('page.cetak.upload')
            ->with('nip', $nip);
    }

    public function save_upload_photo(Request $request){



        $upload = $this->cetakKartuRepository->upload_photo($request);

        return json_encode($upload);
    }


    public function cetak_depan($nip){

        $data = $this->cetakKartuRepository->cetak_depan($nip);

        return view('page.cetak.cetak')
            ->with('data',$data)
            ->with('nip',$nip);
    }

    public function cetak_belakang($nip){



        return view('page.cetak.cetak_back')
            ->with('data',$nip);
    }
}
