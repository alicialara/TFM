<?php

namespace App\Http\Controllers;

use App\Models\SurveysSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use yajra\Datatables\Facades\Datatables;

class SurveySuggestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('getUserRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('survey_suggestions.index');
    }
    public function get_table(){
//        if($GLOBALS['ADMIN']){
            $surveys_s = DB::table('surveys_suggestions')->select('id_question','suggestion')->get();
            $datatable =  Datatables::of($surveys_s)
                ->addColumn('ver','<a href="'.URL_BASE.'/survey_suggestions/{{ $id_question }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Ver</a> ')
                ->make(true);
//        }
        return $datatable;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ss = SurveysSuggestion::find($id);
        return View::make('survey_suggestions.show')
        ->with('ss', $ss);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
