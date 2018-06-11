<?php

namespace App\Http\Controllers;

use App\Log;
use App\Models\IndexItinerary;
use DOMNode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Sunra\PhpSimple\HtmlDomParser;

class ItinerarioController extends Controller
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
    public function index2()
    {
        return view('itinerario/index');
    }

    /**
     * Show the application myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index_itineraries = DB::table('index_itineraries')->pluck("title","id")->all();
        return view('itinerario/index',compact('index_itineraries'));
    }


    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $index_itineraries = DB::table('index_itineraries')->where('title',$request->title)->pluck("title","id")->all();
            $data = view('ajax-select',compact('index_itineraries'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'id'      => 'required|max:255',
            'final_html'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('itinerario')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            if(Input::get('id')){
                $obj = IndexItinerary::find(Input::get('id'));
                if(!$obj || $obj == null){
                    $obj = new IndexItinerary();
                }
            }else{
                $obj = new IndexItinerary();
            }
            $html = Input::get('final_html');
            $obj->html = html_entity_decode($html);
            $obj->save();
            //También almaceno en logs
//            $log = new Log();
//            $log->id_usuario = MyUserPermissions::get_id_usuario();
//            $log->key = Route::getCurrentRoute()->getName();
//            $log->value = json_encode($obj);
//            $log->save();
            // redirect
            Session::flash('message', 'Itinerario editado correctamente');
            return Redirect::to('itinerario/'.$obj->id.'/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $error = '';
        $data = Input::all();
        $selected_ids = explode(",", $data['itinerario']);
        #por ahora me quedo sólo con 1 de ellos, no hay itinerarios de más de 1 valor
        $id = $selected_ids[0];
        $paragraphs = array();
        $index_itineraries = DB::table('index_itineraries')->where('id',$id)->first();
        $html_string = $index_itineraries->html;
        $html = HtmlDomParser::str_get_html( $html_string );
        foreach($html->find('a') as $element){
            $element->target = '_blank';
            if($element->href){
                $element->outertext  = $element->plaintext;
            }elseif($element->id_character){
                $element->href = "/personaje/" . $element->id_character;
            }elseif($element->id_reference){
                $element->href = "/referencia/" . $element->id_reference;
            }elseif($element->id_evento){
                $element->href = "/evento/" . $element->id_evento;
            }elseif($element->id_artwork){
                $element->href = "/artworks/" . $element->id_artwork;
            }
        }
        foreach($html->find('p') as $element){
            if(isset($element->id_artwork)){
                $data = new stdClass();
                $id_artwork =  $element->id_artwork;
                $artwork = DB::table('processed_artworks')->where('id',$id_artwork)->first();
                $element->class="text-center";
                $text =  $element->outertext;
                $data->text = $text;
                $data->name_artwork = $artwork->name;
                $data->image_artwork = $artwork->image;
                $data->id_artwork = $id_artwork;
                array_push($paragraphs, $data);
            }
        }
        $total_p = count($paragraphs)-1;
        if($total_p < $page){
            $error = "No se encuentra el segmento";
        }
        $data = $paragraphs[$page];
        $next = $page+1;

        if($total_p < $next){
            $next = -1;
        }
        $previous = $page-1;
        return view('itinerario/show')
            ->with('page', $page)
            ->with('error', $error)
            ->with('previous', $previous)
            ->with('next', $next)
            ->with('index_itineraries', $index_itineraries)
            ->with('data', $data);
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
            return Redirect::to('/itinerario');
        }

        $obj = IndexItinerary::find($id);
        $html = HtmlDomParser::str_get_html( $obj->html );
        foreach($html->find('a') as $element){
            $element->target = '_blank';
            if($element->href){
                $element->outertext  = $element->plaintext;
            }elseif($element->id_character){
                $element->href = "/personaje/" . $element->id_character;
            }elseif($element->id_reference){
                $element->href = "/referencia/" . $element->id_reference;
            }elseif($element->id_evento){
                $element->href = "/evento/" . $element->id_evento;
            }elseif($element->id_artwork){
                $element->href = "/obra/" . $element->id_artwork;
            }
        }
        $array_segments = array();
        foreach($html->find('p') as $element){
            array_push($array_segments,$element->outertext());
        }
        $obj->html = $html->outertext;
        return view('itinerario/edit')
            ->with('itinerario',$obj)
            ->with('array_segments',$array_segments);
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
