<?php

namespace App\Http\Controllers;

use App\Repositories\Repository\PegawaiRepository;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    /**
     * @var PegawaiRepository
     */
    private $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function index(){
        $pegawai = $this->pegawaiRepository->index();

        return view('page.pegawai.index')
            ->with('pegawai',$pegawai);
    }

    public function search(Request $request){

        $pegawai = $this->pegawaiRepository->search($request);

//        return $pegawai;
        return view('page.pegawai.index')
            ->with('pegawai',$pegawai);
    }
}
