<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class EncuestasController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('getUserRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Input::get('p');
        if(!isset($page) || $page == False || $page <= 0){
            $page = 1;
        }
        $edad = array(
            "0" => "Hasta 20 años",
            "1" => "Entre 21 y 30 años",
            "2" => "Entre 31 y 60 años",
            "3" => "Más de 61 años",
        );
        $estudios = array(
            "0" => "Estudios secundarios (Bachiller / Formación Profesional)",
            "1" => "Estudios superiores (Universitarios / Formación Profesional Superior)",
            "2" => "Sin estudios / estudios primarios"
        );
        return View::make('encuestas.index')
            ->with("page", $page)
            ->with("edad", $edad)
            ->with("estudios", $estudios);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
        $encuesta = new Encuesta();
        $encuesta->cookie_id = Session::getId();
        $encuesta->data = json_encode(Input::all());

        $encuesta->save();

        // redirect
        Session::flash('message', 'Encuesta almacenada correctamente');
        return Redirect::to('/itinerario');

    }

    public function results(){
        $encuestas = Encuesta::all();

        $fortalezas = array();
        $debilidades = array();
        $mejorable = array();
        $data_pie_1 = array();
        $data_pie_2 = array();

        $edad = array(
            "0" => "Hasta 20 años",
            "1" => "Entre 21 y 30 años",
            "2" => "Entre 31 y 60 años",
            "3" => "Más de 61 años",
        );
        $estudios = array(
            "0" => "Estudios secundarios (Bachiller / Formación Profesional)",
            "1" => "Estudios superiores (Universitarios / Formación Profesional Superior)",
            "2" => "Sin estudios / estudios primarios"
        );
        $edades = ["0" => 0, "1" => 0, "2" => 0, "3" => 0];
        $estudios_ = ["0" => 0, "1" => 0, "2" => 0];
        $conocimiento_previo = 0;
        foreach ($encuestas as $encuesta) {
            $data = json_decode($encuesta->data);
            if (strlen($data->oa_1) > 1) {
                $fortalezas[] = $data->oa_1;
            }
            if (strlen($data->oa_2) > 1) {
                $debilidades[] = $data->oa_2;
            }
            if (strlen($data->oa_3) > 1) {
                $mejorable[] = $data->oa_3;
            }
            $edades[$data->edad] = $edades[$data->edad] + 1;
            $estudios_[$data->estudios] = $estudios_[$data->estudios] + 1;
            if (!isset($data->q_1)) {
                $data->q_1 = 3;
            }
            $conocimiento_previo += $data->q_1;
        }
        foreach ($edades as $key => $value) {
            $data_pie_1[] = ["y" => round(($value * 100) / count($encuestas), 1), "label" => $edad[$key]];
        }
        foreach ($estudios_ as $key => $value) {
            $data_pie_2[] = ["y" => round(($value * 100) / count($encuestas), 1), "label" => $estudios[$key]];
        }
        $conocimiento_previo = round($conocimiento_previo / count($encuestas), 1);
        return View::make('encuestas.results')
            ->with("encuestas", $encuestas)
            ->with("fortalezas", $fortalezas)
            ->with("debilidades", $debilidades)
            ->with("mejorable", $mejorable)
            ->with("data_pie_1", json_encode($data_pie_1))
            ->with("data_pie_2", json_encode($data_pie_2))
            ->with("conocimiento_previo", $conocimiento_previo);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
