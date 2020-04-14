<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 06/04/20
 * Time: 19.57
 */

namespace App\Repositories\Interfaces;

interface CetakKartuRepositoryInterfaces
{
    public function index($request);

    public function upload_photo($request);

    public function cetak_depan($nip);

    public function cetak_belakang($nip);
}