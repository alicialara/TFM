<?php

namespace App\Http\Controllers;

use App\User;
use App\WorksUrlsList;
use Illuminate\Http\Request;
use Datatables;

class UrlsController extends Controller
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

        return view('urls/index');
    }
    public function get_table_urls(){
        return Datatables::of(WorksUrlsList::query())->make(true);
    }
    public function import(){

        return view('urls/exceltodb');
    }
}
