<?php
namespace lib\simplemvc;

use lib\simplemvc\Response;

class Request {
    
    public $params = array();
    public $response = null;
    
    /**
     * TODO: Should be implemented a solution for the known security problems like sql injection, xss, csrf.
     * TODO: Should implement router
     */
    function __construct() {
        $this->params['controller'] = null;
        $this->params = array_merge($this->params, $_SERVER, $_REQUEST, $_POST, $_GET);
               
        return $this;
    }

    /**
     * return Response
     */
    public function init() {
        $this->response = new Response($this);
        return $this;
    }

    public function getResponse() {
        return $this->response;
    }
    
}
