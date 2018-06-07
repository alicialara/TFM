<?php

namespace App\Http\Controllers;

use App\Models\ProcessedArtwork;
use Illuminate\Http\Request;
use App\Log;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

use Solarium;
use yajra\Datatables\Facades\Datatables;


class ArtworkController extends Controller
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
        return View::make('artworks.index')
            ->with('modal', false);
    }
    public function get_table(){
        $artworks = DB::table('processed_artworks')->select('id','name')->get();
        $datatable =  Datatables::of($artworks)
            ->addColumn('ver','<a href="'.URL_BASE.'/artworks/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->make(true);
        return $datatable;
    }
    public function get_table_modal(){
        $artworks = DB::table('processed_artworks')->select('id','name')->get();
        $datatable =  Datatables::of($artworks)
            ->editColumn('name','<span id="titulo_{{ $id }}">{{ $name }}</span>')
            ->addColumn('ver','<a href="'.URL_BASE.'/artworks/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
            ->addColumn('seleccionar','<p><input type="radio" id="{{ $id  }}" name="optradio"><label for="{{ $id  }}"></label></p>')
            ->make(true);
        return $datatable;
    }
    public function modal()
    {
        $obj = ProcessedArtwork::all();
        return View::make('artworks.index_modal')
            ->with('artworks', $obj)
            ->with('modal', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            return Redirect::to('artworks/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = ProcessedArtwork::find(Input::get('id'));
                if(!$obj || $obj == null){
                    return Redirect::to('artworks/edit')
                        ->withErrors('No se encuentra la obra');
                }
            }else{
                return Redirect::to('artworks/edit')
                    ->withErrors('No se encuentra la obra');
            }
            $obj = $this->get_solr_data($obj);


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
        $obj = ProcessedArtwork::find($id);
        $obj = $this->get_solr_data($obj);
        $segments = $this->get_segments($obj);
        return View::make('artworks.show')
            ->with('artwork', $obj)
            ->with('segments', $segments);
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
            return Redirect::to('/artworks');
        }
        $obj = ProcessedArtwork::find($id);
        $obj = $this->get_solr_data($obj);
        return view('artworks/edit')
            ->with('artwork',$obj);
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
    private function get_solr_data($artwork){
        $id_artwork = $artwork->id;
        if(SOLR){
            $config = array(
                'endpoint' => array(
                    'localhost' => array(
                        'host' => env('SOLR_HOST', '127.0.0.1'),
                        'port' => env('SOLR_PORT', '8983'),
                        'path' => env('SOLR_PATH', '/solr/'),
    //                    'core' => env('SOLR_CORE', 'TFM')
                        'core' => env('SOLR_CORE', 'ND_processed')
                    )
                )
            );
            $solr_client = new \Solarium\Client($config);

            $query = $solr_client->createSelect();
    //        $query->addFilterQuery(array('key'=>'id', 'query'=>'id:'.$id_artwork, 'tag'=>'include'));
            $query->createFilterQuery('id')->setQuery('id:'.$id_artwork);
            $resulset = $solr_client->select($query);
            $num_found = $resulset->getNumFound();
            if($num_found==0){
                return Redirect::to('artworks/edit')
                ->withErrors('No se encuentra información sobre la obra');
            }
            $documents = $resulset->getDocuments();
            $document = $documents[0];
            foreach($document as $key => $value){
                if($key != 'image')
                    $artwork->$key = $value;
            }
        }else{
            $json_data = json_decode($artwork->json_metadata);
            foreach($json_data as $key => $value){
                if($key != 'image')
                    $artwork->$key = $value;
            }
        }
        return $artwork;
    }
    private function get_segments($artwork){
        if(!SOLR){
            Session::flash('info', 'Los segmentos asociados a la obra sólo se muestran en perfil administrador');
            return array();
        }
        $id_artwork = $artwork->id;
        $id_segment = "id:" . $id_artwork . "_*";

        $config = array(
            'endpoint' => array(
                'localhost' => array(
                    'host' => env('SOLR_HOST', '127.0.0.1'),
                    'port' => env('SOLR_PORT', '8983'),
                    'path' => env('SOLR_PATH', '/solr/'),
                    'core' => env('SOLR_CORE', 'TFM')
//                    'core' => env('SOLR_CORE', 'ND_processed')
                )
            )
        );
        $solr_client = new \Solarium\Client($config);
        $query = $solr_client->createSelect();
        $query->createFilterQuery('id')->setQuery($id_segment);
        $resulset = $solr_client->select($query);
        $num_found = $resulset->getNumFound();
        $data = array();
        if($num_found>0){
            $documents = $resulset->getDocuments();
            foreach($documents as $document){
                $obj = new \stdClass();
                foreach($document as $key => $value){
                    $obj->$key = $value;
                }
                array_push($data,$obj);
            }
        }

        return $data;
    }
}
