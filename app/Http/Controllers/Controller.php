<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $sparql;

    function __construct(){

        RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
        RdfNamespace::set('endek', 'http://www.semanticweb.org/macbookpro/ontologies/2021/8/untitled-ontology-16#');

        $this->sparql = new Client('http://127.0.0.1:3030/siendek/query');
    }

    public function parseData($str){
        return str_replace('http://www.semanticweb.org/macbookpro/ontologies/2021/8/untitled-ontology-16#', '', $str);
    }
}
