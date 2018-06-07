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
