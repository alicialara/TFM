<?php

namespace App\Http\Controllers;

use App\Log;
use App\Narrativa;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class NarrativaController extends Controller
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
        $narrativa = Narrativa::all();

        // load the view and pass the nerds
        return View::make('narrativa.index')
            ->with('narrativa', $narrativa)
            ->with('selection', false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('narrativa/create');
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

            'titulo'      => 'required|max:255',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('narrativa/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = Narrativa::find(Input::get('id'));
                if(!$obj || $obj == null){
                    $obj = new Narrativa;
                }
            }else{
                $obj = new Narrativa;
            }

            $obj->titulo = Input::get('titulo');
            $obj->descripcion = Input::get('descripcion');
            $obj->id_usuario = MyUserPermissions::get_id_usuario();
            $obj->save();

            //También almaceno en logs
            $log = new Log();
            $log->id_usuario = MyUserPermissions::get_id_usuario();
            $log->key = Route::getCurrentRoute()->getName();
            $log->value = json_encode($obj);
            $log->save();

            // redirect
            Session::flash('message', 'Narrativa creada correctamente');
            return Redirect::to('narrativa');
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
        $obj = narrativa::find($id);
        return View::make('narrativa.show')
            ->with('narrativa', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = narrativa::find($id);
        $obj->fecha_inicio = strtotime($obj->fecha_inicio);
        $obj->fecha_inicio_dia = date('d', $obj->fecha_inicio);
        $obj->fecha_inicio_mes = date('m', $obj->fecha_inicio);
        $obj->fecha_inicio_anyo = date('Y', $obj->fecha_inicio);
        $obj->fecha_fin = strtotime($obj->fecha_fin);
        $obj->fecha_fin_dia = date('d', $obj->fecha_fin);
        $obj->fecha_fin_mes = date('m', $obj->fecha_fin);
        $obj->fecha_fin_anyo = date('Y', $obj->fecha_fin);
        return View::make('narrativa.create')
            ->with('narrativa', $obj);
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
