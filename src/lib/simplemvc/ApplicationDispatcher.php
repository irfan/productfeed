<?php
namespace lib\simplemvc;

use lib\simplemvc\Request;

/**
 * Singleton, application dispatcher
 * use static getInstance method
 */
class ApplicationDispatcher {
    
    /**
     * singleton instance
     */
    private static $instance = null;

    /**
     * stores request objects
     */
    protected $request = null;

    /**
     * constructor
     */
    private function __construct(){}

    /**
     * prevent cloning
     */
    private function __clone() {}

    /**
     * @return an instance of the dispatcher
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * @return $this
     */
    public function createRequest() {
        $this->request = new Request();
        return $this;
    }
    
    /**
     * @return Request
     */
    public function getRequest(){
        return $this->request;
    }
}

