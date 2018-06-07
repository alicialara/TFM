<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
use Session;
use App\Evento;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class EventoController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = Evento::all();

        // load the view and pass the nerds
        return View::make('evento.index')
            ->with('evento', $evento)
            ->with('modal', false);
    }
    public function modal()
    {

        $evento = Evento::all();

        // load the view and pass the nerds
        return View::make('evento.tablaindex')
            ->with('evento', $evento)
            ->with('modal', true)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evento/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(

            'accion'      => 'required|max:255',
            'fecha_inicio_anyo' => 'required|numeric',
            'fecha_inicio_dia' => 'required|numeric',
            'fecha_inicio_mes' => 'required|numeric',
            'fecha_fin_anyo' => 'required|numeric',
            'fecha_fin_dia' => 'required|numeric',
            'fecha_fin_mes' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('evento/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = Evento::find(Input::get('id'));
                if(!$obj || $obj == null){
                    $obj = new Evento;
                }
            }else{
                $obj = new Evento;
            }

            $obj->accion = Input::get('accion');
            $obj->descripcion = Input::get('descripcion');
            $obj->lugar = Input::get('lugar');
            $fecha_inicio = Input::get('fecha_inicio_anyo')."-".Input::get('fecha_inicio_mes')."-".Input::get('fecha_inicio_dia');
            $fecha_fin = Input::get('fecha_fin_anyo')."-". Input::get('fecha_fin_mes')."-".Input::get('fecha_fin_dia');
            $dtime_ini = DateTime::createFromFormat('Y-m-d', $fecha_inicio);
//            $timestamp_inicio = $dtime_ini->format('Y-m-d');
            $dtime_fin = DateTime::createFromFormat('Y-m-d', $fecha_fin);
//            $timestamp_fin = $dtime_fin->format('Y-m-d');

//            $timestamp_inicio = date('Y-m-d G:i:s', mktime(0, 0, 0, Input::get('fecha_inicio_dia'),Input::get('fecha_inicio_mes'), Input::get('fecha_inicio_anyo')));
//            $timestamp_fin = date('Y-m-d G:i:s', mktime(0, 0, 0, Input::get('fecha_fin_dia'),Input::get('fecha_fin_mes'), Input::get('fecha_fin_anyo')));


            $obj->fecha_inicio = $dtime_ini;
            $obj->fecha_fin = $dtime_fin;

            $obj->save();

            //También almaceno en logs
            $log = new Log();
            $log->id_usuario = MyUserPermissions::get_id_usuario();
            $log->key = Route::getCurrentRoute()->getName();
            $log->value = json_encode($obj);
            $log->save();

            // redirect
            Session::flash('message', 'Nuevo evento creado correctamente');
            return Redirect::to('evento');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Evento::find($id);
        return View::make('evento.show')
            ->with('evento', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Evento::find($id);

        $fecha_inicio = DateTime::createFromFormat("Y-m-d", $obj->fecha_inicio);
        $fecha_fin = DateTime::createFromFormat("Y-m-d", $obj->fecha_fin);
        $obj->fecha_inicio_dia = $fecha_inicio->format('d');
        $obj->fecha_inicio_mes = $fecha_inicio->format('m');
        $obj->fecha_inicio_anyo = $fecha_inicio->format('Y');
        $obj->fecha_fin_dia = $fecha_fin->format('d');
        $obj->fecha_fin_mes = $fecha_fin->format('m');
        $obj->fecha_fin_anyo = $fecha_fin->format('Y');
        return View::make('evento.create')
            ->with('evento', $obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
