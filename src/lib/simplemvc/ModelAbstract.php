<?php
namespace lib\simplemvc;

abstract class ModelAbstract {
    
    /**
     * Each model should have $data
     */
    protected $data;

    /**
     * Each model should have init method
     */
    protected abstract function init();
}

