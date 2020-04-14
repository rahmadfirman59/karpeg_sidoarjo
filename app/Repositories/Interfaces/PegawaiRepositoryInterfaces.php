<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 11/03/20
 * Time: 15.49
 */

namespace App\Repositories\Interfaces;

interface PegawaiRepositoryInterfaces
{
    public function index();

    public function search($request);
}