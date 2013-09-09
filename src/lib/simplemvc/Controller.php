<?php
namespace lib\simplemvc;

class Controller {

    /**
     * returns an instance of controller
     */
    public static function factory($name, $response){
        $name = '\\app\\controller\\' . $name . 'Controller';
        $name = new $name($response);
        return $name;
    }
}

