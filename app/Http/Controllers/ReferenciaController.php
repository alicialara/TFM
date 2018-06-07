<?php

namespace App\Http\Controllers;
use App\Models\ProcessedReference;
use App\Referencia;
use Illuminate\Http\Request;
use App\Log;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Session;
use yajra\Datatables\Facades\Datatables;

class ReferenciaController extends Controller
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
        return View::make('referencia.index')
            ->with('modal', false);
    }
    public function get_table(){

        $artworks = ProcessedReference::query();

        return DataTables::eloquent($artworks)
            ->editColumn('description',function(ProcessedReference $processed) {
                if(strlen($processed->description)>1) return "Si"; else return "No";
            })
            ->addColumn('ver','<a href="'.URL_BASE.'/referencia/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->make(true);

    }
    public function get_table_modal(){
        $artworks = ProcessedReference::query();
        return DataTables::eloquent($artworks)
            ->editColumn('label','<span id="titulo_{{ $id }}">{{ $label }}</span>')
            ->editColumn('description',function(ProcessedReference $processed) {
                if(strlen($processed->description)>1) return "Si"; else return "No";
            })
            ->addColumn('ver','<a href="'.URL_BASE.'/referencia/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->addColumn('seleccionar','<p><input type="radio" id="{{ $id  }}" name="optradio"><label for="{{ $id  }}"></label></p>')
            ->make(true);
    }


    public function modal()
    {
//        $obj = ProcessedReference::all();
        return View::make('referencia.index_modal')
//            ->with('referencia', $obj)
            ->with('modal', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('referencia/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$GLOBALS['AUTHOR']){
            Session::flash('message', 'No tienes permisos para acceder a esta página.');
            return Redirect::to('/');
        }
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'label'      => 'required|max:255'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('referencia/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = ProcessedReference::find(Input::get('id'));
                if(!$obj || $obj == null){
                    $obj = new ProcessedReference;
                }
            }else{
                $obj = new ProcessedReference;
            }

            $obj->label = Input::get('label');
            $obj->url = Input::get('url');
            $obj->description = Input::get('description');
            $obj->save();

            //También almaceno en logs
//            $log = new Log();
//            $log->id_usuario = MyUserPermissions::get_id_usuario();
//            $log->key = Route::getCurrentRoute()->getName();
//            $log->value = json_encode($obj);
//            $log->save();

            // redirect
            Session::flash('message', 'Nueva referencia creada correctamente');
            return Redirect::to('referencia/'.$obj->id.'/edit');
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
        $obj = ProcessedReference::find($id);
        return View::make('referencia.show')
            ->with('referencia', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$GLOBALS['AUTHOR']){
            Session::flash('message', 'No tienes permisos para acceder a esta página.');
            return Redirect::to('/referencia');
        }
        $obj = ProcessedReference::find($id);
        return View::make('referencia.create')
            ->with('referencia', $obj);
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
