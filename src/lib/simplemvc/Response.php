<?php
namespace lib\simplemvc;

use lib\simplemvc\Response;
use lib\simplemvc\Controller;

class Response {
    public $request = null;
    public $controller = null;
    
    public function __construct($request) {
        $this->request = $request;
        $this->setController($request->params['controller']);
    }
    
    public function setController($controller) {
        
        // TODO: Need better implementation
        if (is_null($controller)) {
            $controller = 'index';
        }
        
        $this->controller = Controller::factory($controller, $this);
        $this->controller->init();
        return $this;
    }

    public function getController() {
        return $this->controller;
    }

    public function getRequest() {
        return $this->request;
    }
}
