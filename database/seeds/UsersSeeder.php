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
            DB::table('users')
                ->insert(['username'=>$value->Nip,'password'=>encrypt($value->Nip)]);
        }

    }
}
