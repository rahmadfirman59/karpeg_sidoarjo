<?php

namespace App\Http\Controllers;

use App\Perkawinan;
use App\Repositories\Repository\PengajuanPerkawinanRepository;
use Illuminate\Http\Request;

class PengajuanPerkawinan extends Controller
{
    //


    /**
     * @var PengajuanPerkawinanRepository
     */
    private $pengajuanPerkawinanRepository;

    public function __construct(PengajuanPerkawinanRepository $pengajuanPerkawinanRepository)
    {

        $this->pengajuanPerkawinanRepository = $pengajuanPerkawinanRepository;
    }

    public function index(){
        $data = Perkawinan::paginate(10);

        return view('page.pengajuan_kawin.index')
            ->with('data',$data);
    }


    public function info ($id){

        $field = $this->pengajuanPerkawinanRepository->info($id);

        return view('page.pengajuan_kawin.info')
            ->with('id',$id)
            ->with('field',$field);
    }

    public function save(Request $request,$id){

        $data = $this->pengajuanPerkawinanRepository->save($request,$id);

        return redirect('/pengajuan_perkawinan')
            ->with('message',$data);

    }
}
