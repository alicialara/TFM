<?php
/**
 * Created by PhpStorm.
 * User: alara
 * Date: 29/09/2017
 * Time: 12:50
 */

namespace App\Http\Crawler;
use Solarium;
use Solarium\Client;
use Sunra\PhpSimple\HtmlDomParser;


class Babelnet
{

    var $palabra;
    var $result;

    /**
     * Babelnet constructor.
     * @internal param Solarium\Client $client
     * @internal param $palabra
     */
    public function __construct()
    {
        $this->client = new Client;
        $this->result = 'Constructor OK';
    }
    function getUrlContent($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($httpcode>=200 && $httpcode<300) ? $data : false;
    }
    public function execute(){
        $url = 'http://babelnet.org/synset?word='.$this->palabra.'&lang=ES';
        $html = self::getUrlContent($url);
//        $array_response_aux = array();
//        $array_response_aux['url'] = $url;
//
        $html = trim(preg_replace('/\s\s+/', ' ', $html));
        $html_format = HtmlDomParser::str_get_html($html);
        $node_work = $html_format->find('div[class="tabbable active"]', 0);

        $word_id = $node_work->find('.word-id', 0)->plaintext;
        $word_id = str_replace("&nbsp;", '', $word_id);
        $word_id = str_replace("&bull;", '', $word_id);

        $categorias = $node_work->find('.word-cats', 0)->first_child()->plaintext;
        $categorias = explode(",", $categorias);
        $categorias=array_map('trim',$categorias);

        $descripcion = $node_work->find('.word-definition', 0)->first_child()->outertext();

        $descripcion_limpia = strip_tags($descripcion);

        $relations = array();
        foreach($node_work->find('span[class="sense-lang edge-type relation-tab"]') as $node){
            $relation = $node->parent()->plaintext;
            $value = $node->parent()->next_sibling()->next_sibling()->outertext();
            $relations[$relation] = $value;
        }



        $word_id = $word_id;

    }



    public function pingSolr()
    {
        // create a ping query
        $ping = $this->client->createPing();

        // execute the ping query
        try {
            $this->client->ping($ping);
            $this->result = 'Ping OK';
        } catch (\Solarium\Exception $e) {
            $this->result = 'Ping NOK';
        }
    }

    /**
     * @return mixed
     */
    public function getPalabra()
    {
        return $this->palabra;
    }

    /**
     * @param mixed $palabra
     */
    public function setPalabra($palabra)
    {
        $this->palabra = $palabra;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }












}