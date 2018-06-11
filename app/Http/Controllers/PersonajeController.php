<?php

namespace App\Http\Controllers;

use App\Models\ProcessedArtwork;
use App\Models\ProcessedCharacter;
use App\Models\ProcessedReference;
use App\Personaje;
use Illuminate\Http\Request;
use App\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Session;
use yajra\Datatables\Facades\Datatables;

class PersonajeController extends Controller
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
        return View::make('personaje.index')
            ->with('modal', false);
    }
    public function get_table(){

        $artworks = ProcessedCharacter::query();

        return DataTables::eloquent($artworks)
            ->editColumn('image','<img src="{{ $image }}" class="img-responsive" alt="{{ $label }}" style="max-height: 31px;max-width: 132px;"> ')
            ->editColumn('description_wp',function(ProcessedCharacter $processed_characters) {
                if(strlen($processed_characters->description_wp)>1) return "Si"; else return "No";
            })
            ->editColumn('description_mp',function(ProcessedCharacter $processed_characters) {
                if(strlen($processed_characters->description_mp)>1) return "Si"; else return "No";
            })
            ->addColumn('ver','<a href="'.URL_BASE.'/personaje/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->make(true);

    }
    public function get_table_modal(){
        $artworks = ProcessedCharacter::query();
        return DataTables::eloquent($artworks)
            ->editColumn('label','<span id="titulo_{{ $id }}">{{ $label }}</span>')
            ->editColumn('description_wp',function(ProcessedCharacter $processed_characters) {
                if(strlen($processed_characters->description_wp)>1) return "Si"; else return "No";
            })
            ->editColumn('description_mp',function(ProcessedCharacter $processed_characters) {
                if(strlen($processed_characters->description_mp)>1) return "Si"; else return "No";
            })
            ->addColumn('ver','<a href="'.URL_BASE.'/personaje/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->addColumn('seleccionar','<p><input type="radio" id="{{ $id  }}" name="optradio"><label for="{{ $id  }}"></label></p>')
            ->make(true);
    }


    public function modal()
    {
//        $obj = ProcessedCharacter::all();
        return View::make('personaje.index_modal')
//            ->with('personaje', $obj)
            ->with('modal', true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personaje/create');
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
            'label'      => 'required|max:255'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('personaje/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = ProcessedCharacter::find(Input::get('id'));
                if(!$obj || $obj == null){
                    $ref = ProcessedReference::find(Input::get('id'));
                    if(!$ref || $ref == null){
                        $obj = new ProcessedCharacter;
                    }else{
                        $obj = ProcessedCharacter::where('id_entity', '=' ,$ref->id_entity);
                        if(!$obj || $obj == null){
                            $obj = new ProcessedCharacter;
                        }else $obj = $obj->first();
                    }
                }
            }else{
                $obj = new ProcessedCharacter;
            }

            $obj->label = Input::get('label');
            $obj->fecha_nacimiento = Input::get('fecha_nacimiento');
            $obj->fecha_fallecimiento = Input::get('fecha_fallecimiento');
            $obj->lugar_nacimiento = Input::get('lugar_nacimiento');
            $obj->lugar_fallecimiento = Input::get('lugar_fallecimiento');
            $obj->description_mp = Input::get('description_mp');
            $obj->description_wp = Input::get('description_wp');
            $obj->image = Input::get('image');
            $obj->save();

            //También almaceno en logs
//            $log = new Log();
//            $log->id_usuario = MyUserPermissions::get_id_usuario();
//            $log->key = Route::getCurrentRoute()->getName();
//            $log->value = json_encode($obj);
//            $log->save();

            // redirect
            Session::flash('message', 'Nuevo personaje creado correctamente');
            return Redirect::to('personaje/'.$obj->id.'/edit');
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
        $obj = ProcessedCharacter::find($id);
        if(!$obj || $obj == null){
            $ref = ProcessedReference::find($id);
            if(!$ref || $ref == null){
                $obj = False;
            }else{
                $obj = ProcessedCharacter::where('id_entity', '=' ,$ref->id_entity);
                if(!$obj || $obj == null){
                    $obj = False;
                }else $obj = $obj->first();
            }
        }
        return View::make('personaje.show')
            ->with('personaje', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $obj = ProcessedCharacter::find($id);
        if(!$obj || $obj == null){
            $ref = ProcessedReference::find($id);
            if(!$ref || $ref == null){
                $obj = False;
            }else{
                $obj = ProcessedCharacter::where('id_entity', '=' ,$ref->id_entity);
                if(!$obj || $obj == null){
                    $obj = False;
                }else $obj = $obj->first();
            }
        }
        return View::make('personaje.create')
            ->with('personaje', $obj);
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
