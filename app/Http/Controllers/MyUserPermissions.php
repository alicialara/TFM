<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 1/18/2017
 * Time: 12:11 AM
 */

namespace App\Http\Controllers;

use App\Log;
use Auth;
use Illuminate\Support\Facades\Session;


class MyUserPermissions
{

    public static function is_admin(){
        if (\Auth::check()) {
            $id_usuario = \Auth::user()->id;
            if($id_usuario == 1 || $id_usuario == 31) return true;
        }
        return false;
    }

    public static function is_author(){
        if (\Auth::check()) {
            $id_usuario = \Auth::user()->id;
            if($id_usuario == 1) return true;
        }
        return false;
    }
    public static function save_log_data($ruta, $data){
        //También almaceno en logs
        $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
        $url = $base_url . $_SERVER["REQUEST_URI"];

        if (\Auth::check()) {
            $log = new Log();
            $log->id_usuario = \Auth::user()->id;
            $log->key = $ruta;
            $log->value = json_encode($data);
            $log->url = $url;
            $log->save();
        }else{
            $log = new Log();
            $log->id_usuario = Session::getId();
            $log->key = $ruta;
            $log->value = json_encode($data);
            $log->url = $url;
            $log->save();
        }
    }
    public static function get_id_usuario(){
        return \Auth::user()->id;
    }
    public static function get_user_name(){
        return \Auth::user()->name;
    }

}