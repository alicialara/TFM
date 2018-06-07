<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 1/18/2017
 * Time: 12:03 AM
 *
 * Crawler para obtener datos del Museo del Prado - Metadata
 */
namespace App\Http\Crawler;
use App\WorksCrawlerDataEs;
use App\WorksCrawlerDataEn;
use App\WorksUrlsList;
use Auth;
use DateTime;
use Illuminate\Support\Facades\DB;
use ML\JsonLD\JsonLD;
use stdClass;
use Sunra\PhpSimple\HtmlDomParser;
class Crawler
{
    private $html;
    private $array_urls;
    private $array_urls_en;
    private $array_response;
    private $array_response_en;
    private $response_type;
    private $response;
    private $num_rows;
    public function __construct(){
        $this->response = 'Crawler not executed.';
        $this->response_type = 'warning';
        $this->array_urls = array();
        $this->array_urls_en = array();
        $this->array_response = array();
        $this->array_response_en = array();
        $this->num_rows = 1;
    }
    private function select_next_urls($lang){
        if($lang == 'es'){
            $this->array_urls = DB::select('SELECT works_urls_list.id,works_urls_list.url FROM works_urls_list
LEFT JOIN works_crawler_data_es ON works_urls_list.id = works_crawler_data_es.id
WHERE works_crawler_data_es.id IS NULL AND works_urls_list.url IS NOT NULL LIMIT ?', [$this->num_rows]);
        }else{
            $this->array_urls = DB::select('SELECT works_urls_list.id,works_urls_list.url_en as url FROM works_urls_list
LEFT JOIN works_crawler_data_en ON works_urls_list.id = works_crawler_data_en.id
WHERE works_crawler_data_en.id IS NULL AND works_urls_list.url_en IS NOT NULL LIMIT ?', [$this->num_rows]);
        }
    }
    private function select_next_urls_standards($lang){
        if($lang == 'es'){
            $this->array_urls = DB::select('SELECT works_urls_list.id,works_urls_list.url AS url FROM works_urls_list
LEFT JOIN e22_man_made_object ON e22_man_made_object.id_cidoc_crm = works_urls_list.id
WHERE e22_man_made_object.id_cidoc_crm IS NULL LIMIT ?', [$this->num_rows]);
        }elseif($lang == 'en'){
            $this->array_urls = DB::select('SELECT works_urls_list.id,works_urls_list.url_en AS url FROM works_urls_list
LEFT JOIN e22_man_made_object ON e22_man_made_object.id_cidoc_crm = works_urls_list.id
WHERE e22_man_made_object.id_cidoc_crm IS NULL LIMIT ?', [$this->num_rows]);
        }
    }


    private function parse_url($id,$url){
        $array_response_aux = array();
        $array_response_aux['id'] = $id;
        $array_response_aux['url'] = $url;

        $html = HtmlDomParser::file_get_html( $url );
        $str_get_html = $html->plaintext;
        if(strlen($str_get_html) > 20){
            $ld_json = $html->find('script[type="application/ld+json"]', 0)->innertext;
            $ld_json = trim($ld_json);
            $ld_json = preg_replace('#(<ul.*?>).*?(</ul>)#', '$1$2', $ld_json);
            $ld_json = str_replace("<ul>","",$ld_json);
            $ld_json = str_replace("</ul>","",$ld_json);

            $json_ld_data = json_decode($ld_json);

            if(count($json_ld_data)>0){
                $eng = $html->find('link[hreflang="en"]', 0);
                if(!is_null($eng) && $eng) $array_response_aux['link_english'] = $eng->href;

                $node_work = $html->find('.obra', 0);
                $array_response_aux['artwork_subtitle'] = $node_work->find('.subtitulo', 0)->innertext;
                $array_response_aux['artwork_name'] = $json_ld_data->name;
                $array_response_aux['artwork_description'] = $json_ld_data->description;
                $array_response_aux['artwork_edition'] = $json_ld_data->artEdition;
                $array_response_aux['artwork_image'] = $json_ld_data->image;
                $array_response_aux['artwork_image_small'] = $html->find('img[style="height:30px"]', 0)->src;
                $array_response_aux['artwork_date_created'] = $json_ld_data->dateCreated;
                $array_response_aux['artwork_date_published'] = $json_ld_data->datePublished;
                $array_response_aux['artwork_date_modified'] = $json_ld_data->dateModified;
                $array_response_aux['artwork_artform'] = $json_ld_data->artform;
                $array_response_aux['artwork_surface'] = $json_ld_data->artworkSurface;
                $array_response_aux['height_value'] = $json_ld_data->height->value;
                $array_response_aux['height_unit_text'] = $json_ld_data->height->unitText;
                $array_response_aux['width_value'] = $json_ld_data->width->value;
                $array_response_aux['width_unit_text'] = $json_ld_data->width->unitText;
                $recurso = $html->find('a[class*="recurso"]', 0);
                if(!is_null($recurso) && $recurso)
                    $array_response_aux['work_voice_encyclopedia'] = $recurso->href;
                else $array_response_aux['work_voice_encyclopedia'] = '';

                $node_tags = $html->find('.tags', 0);
                $tags = array();
                foreach($node_tags->find('span') as $element){
                    $tags[] = strip_tags($element->innertext);
                }
                $array_response_aux['tags'] = $tags;

                $node_multimedia = $html->find('.multimedia', 0);
                $videos_html = array();
                $videos_links = array();
                foreach($node_multimedia->find('figure') as $element){
                    $videos_html[] = $element->outertext;
                    $videos_links[] = $element->find('a',0)->href;
                }
                $array_response_aux['videos_html'] = $videos_html;
                $array_response_aux['videos_links'] = $videos_links;
                $array_response_aux['associated_media'] = $json_ld_data->associatedMedia;
                $node_author = $html->find('.autor', 0);
                $array_response_aux['author_born'] = $node_author->find('h2', 0)->innertext;

                $array_response_aux['author_image'] = '';
                $author_image = $node_author->find('img', 0);
                if($author_image && !is_null($author_image)) $array_response_aux['author_image'] = $author_image->src;

                $array_response_aux['author_description'] = '';
                $author_description = $node_author->find('p', 0);
                if($author_description && !is_null($author_description)) $array_response_aux['author_description'] = $author_description->innertext;


                $array_response_aux['author_url'] = '';
                $author_url = $node_author->find('a', 0);
                if($author_url && !is_null($author_url)) $array_response_aux['author_url'] = $author_url->href;





                $array_response_aux['author_name'] = $json_ld_data->author->name;
                $array_response_aux['author_description'] = $json_ld_data->author->description;


                $array_response_aux['audio'] = '';
                $audio = $html->find('audio', 0);
                if($audio && !is_null($audio)) $array_response_aux['audio'] = $audio->src;
            }
            $this->response = 'Datos obtenidos correctamente';
            $this->response_type = 'success';
        }
        return $array_response_aux;
    }

    private function parse_url_standards($id,$url){
        $array_response_aux = array();
        $array_response_aux['id'] = $id;
        $array_response_aux['url'] = $url;
        $array_response_aux['text'] = 'OK';
        $html = HtmlDomParser::file_get_html( $url );
        $str_get_html = $html->plaintext;
        if(strlen($str_get_html) > 20){
            //Ya sabemos que la URL devuelve datos
            //$ld_json = $html->find('script[type="application/ld+json"]', 0)->innertext;

            $array_response_aux['link_english'] = $html->find('link[hreflang="en"]', 0)->href;

            $tablas_cidoc = array(
                'e22_man_made_object',
                'e36_visual_item',
                'e39_actor_e39_authorship',
                'e42_identifier',
                'e50_date',
                'e54_dimension',
            );
            $tabla_frbr = 'c10003_manifestation';

            foreach($tablas_cidoc as $nombre_tabla){

                $query = "SELECT COLUMN_NAME as colname FROM INFORMATION_SCHEMA.COLUMNS
              WHERE TABLE_SCHEMA = 'aluned' AND TABLE_NAME = '".$nombre_tabla."';";
                $columns = DB::select($query);
                if(count($columns) > 0){
                    foreach($columns as $col){
                        $colname = $col->colname;

                        $array_response_aux[$colname] = '';
                        $data = $html->find('[property*="'.$colname.'"]', 0);
                        if($data && !is_null($data)) $array_response_aux[$colname] = $data->innertext();
                        else{
                            $data = $html->find('[rel*="'.$colname.'"]', 0);
                            if($data && !is_null($data)) $array_response_aux[$colname] = $data->innertext();
                            else{
                                $data = $html->find('[typeof*="'.$colname.'"]', 0);
                                if($data && !is_null($data)) $array_response_aux[$colname] = $data->innertext();
                            }
                        }
                    }
                }
            }
            $array_response_aux['error'] = false;
        }else{
            // Almacenar el error en BBDD
            $array_response_aux['error'] = true;
        }
        return $array_response_aux;
    }


    public function execute_crawler_automatically(){
        $langs = array('es','en');
        $langs = array('es');
        foreach($langs as $lang){
            self::select_next_urls($lang);
//            self::select_next_urls_standards($lang);
            if(count($this->array_urls) > 0){
                foreach($this->array_urls as $select){
                    $url = $select->url;
                    $id = $select->id;
                    $array_response_aux = self::parse_url($id,$url);
//                    $array_response_aux = self::parse_url_standards($id,$url);
                    if(isset($array_response_aux['error'])){
                        $this->response = 'Hay un error con la URL de la obra actual: '.$url;
                        $this->response_type = 'success';
                    }
                    else $this->array_response[] = $array_response_aux;
                }
                self::save_db($lang);
            }else{
                $this->response = 'No quedan obras pendientes para revisar.';
                $this->response_type = 'success';
            }
        }
        return true;
    }
    /**
     *  Save the artwork in the language $lang
     */
    public function save_db($lang){
        foreach($this->array_response as $array){
            $works_urls_list = WorksUrlsList::where('id', $array['id'])->first();
            if(!$works_urls_list) {
                session()->flash('alert-danger',"ERROR no encuentro referencia al ID principal");
            }else{
                if(isset($array['link_english'])){
                    $works_urls_list->url_en = $array['link_english'];
                    $works_urls_list->save();
                }else{
                    $works_urls_list->url_en = 'NOT FOUND';
                    $works_urls_list->save();
                }

            }
            if($lang == 'es'){
                $works_crawler_data = WorksCrawlerDataEs::where('id', $array['id'])->first();
                if(!$works_crawler_data){
                    $works_crawler_data = new WorksCrawlerDataEs();
                    $works_crawler_data->id = $array['id'];
                }
            }elseif($lang == 'en'){
                $works_crawler_data = WorksCrawlerDataEn::where('id', $array['id'])->first();
                if(!$works_crawler_data){
                    $works_crawler_data = new WorksCrawlerDataEn();
                    $works_crawler_data->id = $array['id'];
                }
            }
            $works_crawler_data->artwork_name = $array['artwork_name'];
            $works_crawler_data->artwork_subtitle = $array['artwork_subtitle'];
            $works_crawler_data->artwork_description = $array['artwork_description'];
            $works_crawler_data->artwork_edition = $array['artwork_edition'];
            $works_crawler_data->artwork_image = $array['artwork_image'];
            $works_crawler_data->artwork_image_small = $array['artwork_image_small'];
            $works_crawler_data->artwork_date_created = $array['artwork_date_created'];
            $works_crawler_data->artwork_date_published = $array['artwork_date_published'];
            $works_crawler_data->artwork_date_modified = $array['artwork_date_modified'];
            $works_crawler_data->artwork_artform = $array['artwork_artform'];
            $works_crawler_data->artwork_surface = $array['artwork_surface'];
            $works_crawler_data->height_value = $array['height_value'];
            $works_crawler_data->height_unit_text = $array['height_unit_text'];
            $works_crawler_data->width_value = $array['width_value'];
            $works_crawler_data->width_unit_text = $array['width_unit_text'];
            $works_crawler_data->work_voice_encyclopedia = $array['work_voice_encyclopedia'];
            $works_crawler_data->tags = json_encode($array['tags']);
            $works_crawler_data->videos_html = json_encode($array['videos_html']);
            $works_crawler_data->associated_media = json_encode($array['associated_media']);
            $works_crawler_data->author_born = $array['author_born'];
            $works_crawler_data->author_image = $array['author_image'];
            $works_crawler_data->author_description = $array['author_description'];
            $works_crawler_data->author_url = $array['author_url'];
            $works_crawler_data->author_name = $array['author_name'];
            $works_crawler_data->audio = $array['audio'];
            $works_crawler_data->save();
            session()->flash('alert-success','"'.$works_crawler_data->artwork_name.'"" modificado correctamente.');
        }
    }
    
    public function get_artworks_simple_data($lang=NULL){
        if(is_null($lang)) $lang = 'es';
        $table = 'works_crawler_data_'.$lang;
        $works_crawler_data = DB::table($table)->select('id','artwork_name','author_name')->get();
        return $works_crawler_data;
    }
    public function get_single_artwork($id){
        $object = new stdClass();
        $url = DB::table('works_urls_list')->where('id', $id)->first();
        $lang = 'es';
        $table = 'works_crawler_data_'.$lang;
        $object->$lang = DB::table($table)->where('id', $id)->first();
        if($url->url_en != 'NOT FOUND'){
            $lang = 'en';
            $table = 'works_crawler_data_'.$lang;
            $object->$lang = DB::table($table)->where('id', $id)->first();

            $object->en->url = $url->url_en;
        }else {
            $object->en = false;
        }
        $object->es->url = $url->url;
        return $object;
    }

    public function get_columns(){
        $select = DB::select('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA="aluned" AND TABLE_NAME="works_crawler_data_es"');
        $data = '<select name="columns_names" class="form-control">';
        foreach($select as $s){
            if(
                $s->COLUMN_NAME != 'id' &&
                $s->COLUMN_NAME != 'artwork_image' &&
                $s->COLUMN_NAME != 'artwork_image_small' &&
                $s->COLUMN_NAME != 'work_voice_encyclopedia' &&
                $s->COLUMN_NAME != 'tags' &&
                $s->COLUMN_NAME != 'videos_html' &&
                $s->COLUMN_NAME != 'associated_media' &&
                $s->COLUMN_NAME != 'created_at' &&
                $s->COLUMN_NAME != 'updated_at' &&
                $s->COLUMN_NAME != 'audio'
                ){
                $data .= '<option value="'.$s->COLUMN_NAME.'">'.$s->COLUMN_NAME.'</option>';
            }
                
        }
        $data .= '</select>';
        return $data;
    
    }
    public static function save_revision_metadata($data){
        $array_salida = array('success', 'Revisión enviada correctamente');
        $id_usuario = \Auth::user()->id;
        $insert = "INSERT INTO metadata_revisions(user,data_json,key,value) VALUES ($id_usuario, '".json_encode($data)."', '', ''); ";

        DB::table('metadata_revisions')->insert(
            [
            'user' => $id_usuario, 
            'data_json' => json_encode($data),
            'key' => '',
            'value' => '',
            ]
        );
        return $array_salida;
    }

    //<editor-fold desc="Getters and setters">

    /**
     * @return mixed
     */
    public function getArrayUrls()
    {
        return $this->array_urls;
    }

    /**
     * @param mixed $array_urls
     */
    public function setArrayUrls($array_urls)
    {
        $this->array_urls = $array_urls;
    }

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return mixed
     */
    public function getArrayResponse()
    {
        return $this->array_response;
    }

    /**
     * @param mixed $array_response
     */
    public function setArrayResponse($array_response)
    {
        $this->array_response = $array_response;
    }

    /**
     * @return mixed
     */
    public function getResponseType()
    {
        return $this->response_type;
    }

    /**
     * @param mixed $response_type
     */
    public function setResponseType($response_type)
    {
        $this->response_type = $response_type;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return int
     */
    public function getNumRows()
    {
        return $this->num_rows;
    }

    /**
     * @param int $num_rows
     */
    public function setNumRows($num_rows)
    {
        $this->num_rows = $num_rows;
    }
    //</editor-fold>
}