<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 1/18/2017
 * Time: 12:11 AM
 */

namespace App\Http\Urls;

use App\WorksUrlsList;
use Maatwebsite\Excel\Facades\Excel;

class ExcelToDb
{

    public static function insert_data_to_database($file){
        Excel::load($file, function ($reader) {
            $row = $reader->toArray();
            $row = $row[0];
            $array_work = array();
            foreach($row as $work){
                $work = array_values($work);
                $array_work[$work[0]] = $work[1];
                $exists = WorksUrlsList::where('url', $work[1])->first();
                if($exists) {
                    return array('danger','Ya existía URL');
                }else{
                    $model = new WorksUrlsList;
                    $model->name = $work[0];
                    $model->url = $work[1];
                    $model->save();
                }
            }
        });
        return array('success','Datos añadidos correctamente');
    }
    public static function insert_data_to_database_text($url){
        $exists = WorksUrlsList::where('url', $url)->first();
        if($exists) {
            return array('danger','Ya existía URL');
        }else{
            $model = new WorksUrlsList;
            $model->name = 'Añadido correctamente';
            $model->url = $url;
            $model->save();
        }
        return array('success','Datos añadidos correctamente');
    }

}