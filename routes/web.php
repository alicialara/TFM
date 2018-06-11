<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Evento;
use App\Http\Crawler\Crawler;
use App\Http\Urls;


Route::get('/', function () {
    return view('welcome');
})->middleware('getUserRole');

Route::get('/faq', function () {
    return view('quienes_somos');
})->middleware('getUserRole');


Auth::routes();
Route::get('/home', 'HomeController@index');

/*
 * URLS
 */


/*
 * CRAWLER MP
 */



/*
 * Evento - CRUD
 */

Route::get('/evento/modal', 'EventoController@modal');
Route::resource('/evento', 'EventoController');


/*
 * Personaje - CRUD
 */
Route::get('personaje_get_table', ['as'=>'personaje_get_table','uses'=>'PersonajeController@get_table']);
Route::get('personaje_get_table_modal', ['as'=>'personaje_get_table_modal','uses'=>'PersonajeController@get_table_modal']);
Route::get('/personaje/modal', 'PersonajeController@modal');
Route::resource('/personaje', 'PersonajeController');


/*
 * Referencia - CRUD
 */
Route::get('referencia_get_table', ['as'=>'referencia_get_table','uses'=>'ReferenciaController@get_table']);
Route::get('referencia_get_table_modal', ['as'=>'referencia_get_table_modal','uses'=>'ReferenciaController@get_table_modal']);
Route::get('/referencia/modal', 'ReferenciaController@modal');
Route::resource('/referencia', 'ReferenciaController');

/*
 * Acción externa - CRUD
 */

//Route::get('/accion/modal', 'AccionController@modal');
//Route::resource('/accion', 'AccionController');

/*
 * Narrativa - CRUD
 */
//Route::resource('/narrativa', 'NarrativaController');
/*
 * Helpers
 */
//Route::post('upload/index', 'UploadController@index');


/*
 * Solarium
 */



Route::get('/itinerario', 'ItinerarioController@buscador');
Route::get('/myform', 'ItinerarioController@myform');
Route::resource('/itinerario', 'ItinerarioController');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'SegmentosController@selectAjax']);
Route::post('createitinerary-ajax', ['as'=>'createitinerary-ajax','uses'=>'SegmentosController@createitineraryAjax']);


Route::get('/segmentos/ver_combinados', 'SegmentosController@ver_combinados');
Route::resource('/segmentos', 'SegmentosController');



//Route::get('/artworks', 'ArtworkController@index', [
//    'get_table'  => 'artworks.get_table',
//    'index' => 'artworks',
//]);

Route::get('artworks_get_table', ['as'=>'artworks_get_table','uses'=>'ArtworkController@get_table']);
Route::get('artworks_get_table_modal', ['as'=>'artworks_get_table_modal','uses'=>'ArtworkController@get_table_modal']);
Route::get('/artworks/modal', 'ArtworkController@modal');
Route::resource('/artworks', 'ArtworkController');


Route::get('/encuestas/resultados', 'EncuestasController@results');
Route::resource('/encuestas', 'EncuestasController');


Route::get('suggestions_get_table', ['as'=>'suggestions_get_table','uses'=>'SurveySuggestionsController@get_table']);
Route::resource('/survey_suggestions', 'SurveySuggestionsController');


Route::resource('/logs', 'LogsController');