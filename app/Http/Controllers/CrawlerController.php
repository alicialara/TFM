<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Crawler\Crawler;
use Illuminate\Http\Request;
use yajra\Datatables\Facades\Datatables;
use App\Http;
use Illuminate\Support\Facades\Redirect;

class CrawlerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $es_admin = MyUserPermissions::is_admin();
        return view('crawler/index');
    }

    /**
     *  Gets next page and crawls it
     */
    public function execute_crawler(){
        $es_admin = MyUserPermissions::is_admin();
        if(!$es_admin){
            return Redirect::to('/crawler')->with('message','¡No está permitido acceder a esta página!');
        };
        $crawler = new Crawler();
        $crawler->setNumRows(1);
        $crawler->execute_crawler_automatically();
        return view('crawler/execute_crawler');
    }

    public function get_table(){
        $crawler = new Crawler();
        $artworks = $crawler->get_artworks_simple_data();
        return Datatables::of($artworks)
            ->editColumn('view_es','<a href="'.URL_BASE.'/crawler/view/es/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver en español</a> ')
            ->editColumn('view_en','<a href="'.URL_BASE.'/crawler/view/en/{{ $id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver en inglés</a> ')
            ->make(true);
    }

    public function execute_crawler_babelnet($palabra){
        $es_admin = MyUserPermissions::is_admin();
        if(!$es_admin){
            return Redirect::to('/crawler')->with('message','¡No está permitido acceder a esta página!');
        };
        $crawler = new Http\Crawler\Babelnet();
        $crawler->setPalabra($palabra);
//        $crawler->pingSolr();
        $crawler->execute();
        return $crawler->getResult();
    }
}
