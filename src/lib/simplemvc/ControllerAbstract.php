<?php
namespace lib\simplemvc;

abstract class ControllerAbstract {
    
    public $response;
    public $request;
    
    public function __construct($response) {
        $this->response = $response;
        $this->request = $response->getRequest();
    }

    /**
     * Developers should define init method for each controller
     */
    protected abstract function init();

    /**
     * renders view layer
     */
    protected function render($template, $data) {
        $view = new View();
        $view->render($template, $data);
        return $view;
    }

}

