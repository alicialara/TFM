<?php

namespace App\Http\Controllers;
use Solarium;
use Illuminate\Http\Request;

class SolariumController extends Controller
{
    protected $client;

    public function __construct(\Solarium\Client $client)
    {
        $this->client = $client;
    }

    public function ping()
    {
//        $config = array(
//            'endpoint' => array(
//                'localhost' => array(
//                    'host' => env('SOLR_HOST', '127.0.0.1'),
//                    'port' => env('SOLR_PORT', '8984'),
////            'port' => env('SOLR_PORT', '81'),
//                    'path' => env('SOLR_PATH', '/solr/'),
//                    'core' => env('SOLR_CORE', 'musacces')
//                )
//            )
//        );
//
//        $client = new Solarium\Client($config);
//        $query = $client->createSelect();
//
//        $facetSet = $query->getFacetSet();
//        $facetSet->createFacetField('stock')->setField('inStock');
//
//        $resultset = $client->select($query);
//        echo 'NumFound: '.$resultset->getNumFound() . PHP_EOL;
//
//        $facet = $resultset->getFacetSet()->getFacet('stock');
//        foreach ($facet as $value => $count) {
//            echo $value . ' [' . $count . ']' . PHP_EOL;
//        }
//
//        foreach ($resultset as $document) {
//            echo $document->id . PHP_EOL;
//            echo $document->name . PHP_EOL;
//        }
        // create a ping query
        $ping = $this->client->createPing();

        // execute the ping query
        try {
            $this->client->ping($ping);
            return response()->json('OK');
        } catch (\Solarium\Exception $e) {
            return response()->json('ERROR', 500);
        }
    }

    public function add(){
        // get an update query instance
        $update = $this->client->createUpdate();

        // create a new document for the data
        // please note that any type of validation is missing in this example to keep it simple!
        $doc = $update->createDocument();
        $doc->id = 3;
        $doc->name_s = 'cucu';
        $doc->price_i = 34;

        // add the document and a commit command to the update query
        $update->addDocument($doc);
        $update->addCommit();

        // this executes the query and returns the result
        $result = $this->client->update($update);

        echo '<b>Update query executed</b><br/>';
        echo 'Query status: ' . $result->getStatus(). '<br/>';
        echo 'Query time: ' . $result->getQueryTime();
    }

    public function search()
    {
        $query = $this->client->createSelect();
//        $query->addFilterQuery(array('key'=>'provence', 'query'=>'provence:Groningen', 'tag'=>'include'));
//        $query->addFilterQuery(array('key'=>'degree', 'query'=>'degree:MBO', 'tag'=>'exclude'));
//        $facets = $query->getFacetSet();
//        $facets->createFacetField(array('field'=>'degree', 'exclude'=>'exclude'));
        $resulset = $this->client->select($query);

        // display the total number of documents found by solr
        echo 'NumFound: ' . $resulset->getNumFound();

        // show documents using the resultset iterator
        foreach ($resulset as $document) {

            echo '<hr/><table>';

            // the documents are also iterable, to get all fields
            foreach ($document as $field => $value) {
                // this converts multivalue fields to a comma-separated string
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }

                echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
            }

            echo '</table>';
        }
    }
}
