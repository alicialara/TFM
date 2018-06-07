<?php

namespace App\Http\Controllers;

use App\Models\IndexItinerary;
use App\Models\ProcessedArtwork;
use App\Models\ProcessedReference;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Solarium;
use Sunra\PhpSimple\HtmlDomParser;

class SegmentosController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('getUserRole');
    }
    /*
    * Show the application myform.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $index_segmentos = array();
        return view('segmentos/index',compact('index_segmentos'));
    }


    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $index_segmentos = $this->get_nes_data('labels:' . $request->label);
            $data = view('ajax-select',compact('index_segmentos'))->render();
            return response()->json(['options'=>$data]);
        }
    }
    public function createitineraryAjax(Request $request){
        if($request->ajax()){
            $ids_segments = $request->ids_segmentos;
            $names_ne = $request->names_ne;
            $nombre_itinerario = $request->nombre_itinerario;
            $ids_segments = explode(",", $ids_segments);
            $ids_segments = array_filter($ids_segments);
            $text = '';
            $count = 0;
            foreach($ids_segments as $id_segmento){
                $count++;
                $seg = explode("_", $id_segmento);
                $segment_data = $this->get_segment_data($id_segmento);

                $html_string =  strip_tags(html_entity_decode($segment_data->text),"<a>");
                $text .= '<p id_artwork="' . $seg[0] . '" num_paragraph="' . $seg[2] . '" proc="' . $seg[1] . '">' . $html_string . '</p>';
            }
            $id_usuario = MyUserPermissions::get_id_usuario();
            $id_itinerario = 0;
            $iti = IndexItinerary::where('title', $nombre_itinerario)->first();
            if(!$iti || $iti == null){
                $iti = new IndexItinerary();
                $iti->dir = $id_usuario;
                $iti->ne = $nombre_itinerario;
                $iti->names_ne = $nombre_itinerario.','.$names_ne;
                $iti->title = $nombre_itinerario;
                $iti->count_paragraphs = $count;
                $iti->html = $text;
                $iti->save();
                $id_itinerario = $iti->id;
            }
            return response()->json(['id_itinerario'=>$id_itinerario]);
        }
    }
    public function ver_combinados(Request $request)
    {
        if(Input::get('selected_values')){
            $selected_values = Input::get('selected_values');
            $selected_values = explode(",",$selected_values);
            $results = array();
            $titles_nes = array();
            foreach($selected_values as $segmento){
                $data = $this->get_segments_from_ne_data($segmento);
                if($data != False){
                    $results[$segmento] = $data;
                }
            }
            $titles_nes = $this->get_nes_data('id', $results);
            $data_segments = array();
            $intersect = call_user_func_array('array_intersect',$results);
            $union = array_unique(call_user_func_array('array_merge',$results));
            foreach($results as $ne => $segments){
                $results[$ne] = array_diff($segments, $intersect);
            }
            foreach($union as $id_segment){
                $data_segments[$id_segment] = $this->get_segment_data($id_segment);
            }
            return view('segmentos/ver_combinados')
                ->with('results',$results)
                ->with('intersect',$intersect)
                ->with('titles_nes',$titles_nes)
                ->with('data_segments',$data_segments);

        }else{
            return Redirect::to('segmentos')
                ->withErrors("No hay segmentos seleccionados...");
        }

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
            'id'      => 'required|max:255',
            'text'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('segmentos')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = $this->get_segment_data(Input::get('id'));
                if(!$obj || $obj == null){
                    return Redirect::to('segmentos')
                        ->withErrors('No se encuentra el segmento');
                }
            }else{
                return Redirect::to('segmentos')
                    ->withErrors('No se encuentra el segmento');
            }

            $text = Input::get('text');
            $obj = $this->save_text_to_solr(Input::get('id'), $text);


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
        return View::make('segmentos.show')
            ->with('segmento', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_segmento)
    {
        $obj = $this->get_segment_data($id_segmento);
        return view('segmentos/create')
            ->with('segmento',$obj);
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

    private function save_text_to_solr($id_segment, $text){
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
        $update = $solr_client->createUpdate();
        $doc = $update->createDocument();
        $doc->id = 3;
        $doc = $this->get_segment_data($id_segment,$doc);
        $doc->text = $text;
//        $update->addDocument($doc);
//        $update->addCommit();

        // this executes the query and returns the result
//        $result = $solr_client->update($update);

//        echo '<b>Update query executed</b><br/>';
//        echo 'Query status: ' . $result->getStatus(). '<br/>';
//        echo 'Query time: ' . $result->getQueryTime();
//        return $result->getStatus();
    }

    private function get_segment_data($id_segment, $obj=False){
        if(!$obj) $obj = new \stdClass();
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
//        $query->addFilterQuery(array('key'=>'id', 'query'=>'id:'.$id_artwork, 'tag'=>'include'));
        $query->createFilterQuery('id')->setQuery("id:" . $id_segment);
        $resulset = $solr_client->select($query);
        $num_found = $resulset->getNumFound();
        if($num_found==0){
            return Redirect::to('artworks/edit')
                ->withErrors('No se encuentra información sobre la obra');
        }
        $documents = $resulset->getDocuments();
        $document = $documents[0];
        foreach($document as $key => $value){
            $obj->$key = $value;
        }

        return $obj;
    }
    private function get_segments_from_ne_data($id_segmento='*', $obj=False){
        if(strlen($id_segmento) == 0) return False;
        if(!$obj) $obj = array();
        $config = array(
            'endpoint' => array(
                'localhost' => array(
                    'host' => env('SOLR_HOST', '127.0.0.1'),
                    'port' => env('SOLR_PORT', '8983'),
                    'path' => env('SOLR_PATH', '/solr/'),
                    'core' => env('SOLR_CORE', 'TFM_index_ne')
                )
            )
        );
        $solr_client = new \Solarium\Client($config);
        $query = $solr_client->createSelect();
        $query->setRows(1);
        $query->setQuery('id:' . $id_segmento);
        $resulset = $solr_client->select($query);
        $num_found = $resulset->getNumFound();
        if($num_found==0){
            return False;
        }
        $documents = $resulset->getDocuments();
        $document = $documents[0];
        return $document->ids_segments;
    }

    private function get_nes_data($query_str='*:*', $obj=False){
        if(!$obj) $obj = array();
        $config = array(
            'endpoint' => array(
                'localhost' => array(
                    'host' => env('SOLR_HOST', '127.0.0.1'),
                    'port' => env('SOLR_PORT', '8983'),
                    'path' => env('SOLR_PATH', '/solr/'),
                    'core' => env('SOLR_CORE', 'TFM_index_ne')
//                    'core' => env('SOLR_CORE', 'ND_processed')
                )
            )
        );
        $solr_client = new \Solarium\Client($config);
        $query = $solr_client->createSelect();
//        $query->addFilterQuery(array('key'=>'id', 'query'=>'id:'.$id_artwork, 'tag'=>'include'));
//        $query->createFilterQuery('id')->setQuery('labels:' . $query_str);
        $query->setRows(90000);
        if($query_str == 'id'){
            $query_str = '0';
            foreach($obj as $key => $value){
                $query_str .= ' OR ' . $key;
            }
            $query_str = "id:(".$query_str.")";
        }
        $query->setQuery($query_str);
        $resulset = $solr_client->select($query);
        $num_found = $resulset->getNumFound();
        if($num_found==0){
            return False;
        }
        $documents = $resulset->getDocuments();
        foreach($documents as $document){
            $pos = strpos($document->id, '-1');
            if ($pos === false) $obj[$document->id] = implode(", ",$document->labels);
        }
        return $obj;
    }
}
