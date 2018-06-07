<?php

namespace App\Http\Controllers;

use App\User;
use App\WorksUrlsList;
use Illuminate\Http\Request;
use Datatables;

class RecorridoController extends Controller
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
        return view('recorrido/index');
    }
    public function get_table_recorridos(){
        //return Datatables::of(WorksUrlsList::query())->make(true);
        return ;
    }
    public function new_recorrido(){
        return view('recorrido/new');
    }
}
