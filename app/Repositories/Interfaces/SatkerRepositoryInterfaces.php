<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 12/03/20
 * Time: 09.39
 */

namespace App\Repositories\Interfaces;

interface SatkerRepositoryInterfaces
{
    public function index();

    public function search($request);
}