<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 15/04/20
 * Time: 19.51
 */

namespace App\Repositories\Repository;
use App\Perkawinan;

class PengajuanPerkawinanRepository
{
    public function index(){

    }

    public function info($id){
        $field = [];

        if ($id != 'new'){
            $field = Perkawinan::find($id);
        }
        return $field;
    }


    public function save($data,$id){

        $back = "";
        if($id == 'new'){
            $field = Perkawinan::create($data->all())




            $back ="Disimpan";


        }else{
            $field = Perkawinan::find($id);
            $field->update($data->all());



            $spj  = DB::table('perkawinan')
                ->where('id',$id)
                ->first();
            if ($spj->file != null || $spj->file != '' ){
                $pecah = explode('|',$spj->file);
                $jumlah_file  = count($pecah) + 1;
                $filebaru = $spj->file;
            }else{
                $jumlah_file = 1;
                $filebaru = $spj->file;
            }

            $image=array();
            if($data->hasFile('lampiran')){
                $files=$data->file('lampiran');
                $i=$jumlah_file;
                foreach($files as $file){
                    $file_extension = $file->getClientOriginalExtension();
                    $filename = 'spj_id_'.$request->id.'_lampiran_ke_'.$i.'.'.$file_extension;
                    if (file_exists($destinationPath.'/'.$filename)) {
                        unlink($destinationPath.'/'.$filename);
                    }
                    $file->move($destinationPath,$filename);
                    $image[]=$filename;
                    $i++;
                }
            }



            if ($jumlah_file > 1){
                $gabung_image = implode('|',$image);
                $gabung = $filebaru.'|'.$gabung_image;
            }else{
                $gabung_image = implode('|',$image);
                $gabung = $gabung_image;
            }
            DB::table('spj')
                ->where('fid_spd',$request->id)
//            ->update(['catatan'=>$request->catatan,'file'=>implode("|",$image)]);
                ->update(['catatan'=>$request->catatan,'file'=>$gabung]);


            $back = "Diubah";
        }
        
        
        return $back;


    }
}