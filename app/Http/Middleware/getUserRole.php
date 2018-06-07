<?php

namespace App\Http\Middleware;
use App\Http\Controllers\MyUserPermissions;
use App\Log;

use Closure;
use Illuminate\Support\Facades\Route;

class getUserRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $es_admin = MyUserPermissions::is_admin();
        $is_author = MyUserPermissions::is_author();
        $GLOBALS['ADMIN'] = false;
        $GLOBALS['AUTHOR'] = false;
        if($es_admin) $GLOBALS['ADMIN'] = true;
        if($is_author) $GLOBALS['AUTHOR'] = true;
        $ruta = Route::getCurrentRoute()->getName();
        if($ruta == null) $ruta = 'home';
        MyUserPermissions::save_log_data($ruta, $GLOBALS['_POST']);


        return $next($request);
    }
}
