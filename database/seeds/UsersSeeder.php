<?php

use App\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = DB::table('master_pegawai')
            ->get();

        foreach ($data as $key => $value){

            $pecah = substr($value->Nip,0,5);

            DB::table('users')
                ->insert(['username'=>$value->Nip,'password'=>encrypt($pecah)]);
        }

    }
}
