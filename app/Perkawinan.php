<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkawinan extends Model
{
    //
    protected $table = "perkawinan";

    protected $fillable = ['nip','nama','jabatan','unit_kerja','tempat_lahir','tanggal_lahir','agama','status','alamat',
        'hari','tanggal','tempat','calon_nama','calon_pekerjaan','calon_tempat_lahir',
        'calon_tanggal_lahir','calon_status','calon_alamat','bapak_nama','bapak_tempat_lahir','bapak_tanggal_lahir',
        'bapak_pekerjaan','bapak_agama','bapak_alamat','ibu_nama','ibu_tempat_lahir','ibu_tanggal_lahir',
        'ibu_pekerjaan','ibu_agama','ibu_alamat','bm_nama','bm_tempat_lahir','bm_tanggal_lahir','bm_pekerjaan',
        'bm_agama','bm_alamat','im_nama','im_tempat_lahir','im_tanggal_lahir','im_pekerjaan','im_agama','im_alamat'];
}


