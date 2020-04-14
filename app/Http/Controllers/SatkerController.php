<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\SatkerRepositoryInterfaces;
use App\Repositories\Repository\SatkerRepository;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    //

    /**
     * @var SatkerRepository
     */
    private $satkerRepository;

    public function __construct(SatkerRepositoryInterfaces $satkerRepository)
    {
        $this->satkerRepository = $satkerRepository;
    }


    public function index(){
        $satker = $this->satkerRepository->index();

        return view('page.satker.index')
            ->with('satker',$satker);
    }

    public function search(Request $request){
        $satker = $this->satkerRepository->search($request);


        return view('page.satker.index')
            ->with('satker',$satker);
    }
}
