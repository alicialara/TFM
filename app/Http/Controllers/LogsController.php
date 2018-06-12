<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LogsController extends Controller
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
//        $query = "SELECT * FROM `log`
//                    WHERE  `key` != 'home'
//                    AND url NOT LIKE 'http://tfm/%'
//                    AND url NOT LIKE 'http://aluned.laraclares.com/survey_suggestions'
//                    AND url NOT LIKE '%_get_table%'
//                    AND url NOT LIKE '%/log%'";
//        $logs = DB::select( DB::raw($query) );

        $total_users_q = "SELECT DISTINCT(id_usuario) AS total_users FROM `log`
WHERE url NOT LIKE 'http://tfm/%'
AND url NOT LIKE 'http://aluned.laraclares.com/survey_suggestions'
AND url NOT LIKE '%_get_table%'
AND url NOT LIKE '%/log%'";
        $total_users_r = DB::select(DB::raw($total_users_q));
        $total_users = count($total_users_r);

        $total_urls_q = "SELECT url FROM `log`
WHERE url NOT LIKE 'http://tfm/%'
AND url NOT LIKE 'http://aluned.laraclares.com/survey_suggestions'
AND url NOT LIKE '%_get_table%'
AND url NOT LIKE '%/log%'";
        $total_urls_r = DB::select(DB::raw($total_urls_q));
        $total_urls = count($total_urls_r);

        $total_distict_iti_q = "SELECT DISTINCT(url) AS total_urls FROM `log`
WHERE url LIKE 'http://aluned.laraclares.com/itinerario/0?selected_values=%'";
        $total_distict_iti_r = DB::select(DB::raw($total_distict_iti_q));
        $total_distict_iti = count($total_distict_iti_r);

        $total_iti_q = "SELECT url FROM `log`
WHERE url LIKE 'http://aluned.laraclares.com/itinerario/%' AND url NOT LIKE '%_get_table%'";
        $total_iti_r = DB::select(DB::raw($total_iti_q));
        $total_iti = count($total_iti_r);

//        $ajax_data = $this->selectAjax();

        return View::make('logs.index')
            ->with("total_users", $total_users)
            ->with("total_urls", $total_urls)
            ->with("total_distict_iti", $total_distict_iti)
            ->with("total_iti", $total_iti)//            ->with("ajax_data", $ajax_data)
            ;
    }

    public function selectAjax()
    {
        $array = array();
        $data_final = $this->get_behaviour('http://aluned.laraclares.com/', array());
        $array['http://aluned.laraclares.com/'] = $data_final;
        foreach ($data_final[1] as $url => $percent) {
            $data_aux = $this->get_behaviour($url, array());
            $array['http://aluned.laraclares.com/'][1][$url] = array($percent, $data_aux);
        }
        $salida = array();
        $home_count = $array['http://aluned.laraclares.com/'][0];

        $array_nodes = array();
        $array_nodes_aux = array();
        $array_edges = array();

        $label_first = "/" . " - " . $home_count;
        $array_nodes[$label_first] = $label_first;
        $array_nodes_aux[] = ["id" => $label_first, "label" => $label_first];
        $value = $array['http://aluned.laraclares.com/'];
        $total_count = $value[0];
        $urls = $value[1];

        foreach ($urls as $key => $value) {
            $key = str_replace("http://aluned.laraclares.com", "", $key) . " - " . $value[0];
//            $find = arrayC_search($key, $array_nodes);
            if ($key == '/itinerario/0?selected_values=24 - 0,52356020942408') {
                echo "para";
            }
            if (!in_array($key, $array_nodes)) {
                $array_nodes[$key] = $key;
                $array_nodes_aux[] = ["id" => $key, "label" => $key];
            }
            $array_edges[] = ["from" => $label_first, "to" => $key];


            $urls_next = $value[1];
            foreach ($urls_next[1] as $aux_key => $aux_value) {
                $aux_key = str_replace("http://aluned.laraclares.com", "", $aux_key) . " - " . $aux_value;
                if ($aux_key == '/itinerario/0?selected_values=24 - 0,52356020942408') {
                    echo "para";
                }
//                $findCC = array_search($aux_key, $array_nodes);
                if (!in_array($aux_key, $array_nodes)) {
                    $array_nodes[$aux_key] = $aux_key;
                    $array_nodes_aux[] = ["id" => $aux_key, "label" => $aux_key];
                }
                $array_edges[] = ["from" => $key, "to" => $aux_key];
            }
        }

        return json_encode(["nodes" => $array_nodes_aux, "edges" => $array_edges]);
    }

    private function get_behaviour($init_page)
    {
        $users_home_q = "SELECT DISTINCT(id_usuario) as id_usuario, id FROM `log` WHERE  `url` = '" . $init_page . "'";
        $total_home_r = DB::select(DB::raw($users_home_q));
        $count_total_ = count($total_home_r);
        $pages = array();
        $cuenta = 0;
        foreach ($total_home_r as $user_home) {
            $next_page_q = "SELECT url FROM `log`
                        WHERE id_usuario = '" . $user_home->id_usuario . "'
                        AND url NOT LIKE 'http://tfm/%'
                        AND url NOT LIKE 'http://aluned.laraclares.com/survey_suggestions'
                        AND url NOT LIKE '%_get_table%'
                        AND url NOT LIKE '%/log%'
                        AND id > " . $user_home->id . "
                        ORDER BY id ASC
                        LIMIT 1";
            $next_page_r = DB::select(DB::raw($next_page_q));
            if (count($next_page_r) > 0) {
                if (isset($pages[$next_page_r[0]->url])) {
                    $pages[$next_page_r[0]->url] = $pages[$next_page_r[0]->url] + 1;
                } else {
                    $pages[$next_page_r[0]->url] = 1;
                }
                $cuenta++;
            }

        }
        if (count($pages) == 0) return False;
        $pages_percent = array();
        foreach ($pages as $key => $value) {
            $percent = ($value / $cuenta) * 100;
            $pages_percent[$key] = $percent;
        }
//        $data_final[$init_page] = $pages_percent;
        return array($count_total_, $pages_percent);
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
        //
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
