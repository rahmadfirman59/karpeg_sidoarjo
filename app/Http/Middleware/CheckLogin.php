<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 10/03/20
 * Time: 14.21
 */

namespace App\Http\Middleware;

use Closure;
class CheckLogin
{

    public function handle($request, Closure $next){
        if (session('useractive')){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}