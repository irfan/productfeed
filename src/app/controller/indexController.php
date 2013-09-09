<?php
namespace app\controller;

use lib\simplemvc\ControllerAbstract;
use app\model\productModel;

class indexController extends ControllerAbstract {

    public function __construct($response) {
        parent::__construct($response);
    }
    
    public function init() {
        $params = $this->request->params;
        $output = array(
            'total' => 0, 
            'dublicated' => 0
        );

        if (!array_key_exists('url', $params)){
            if (array_key_exists('HTTP_X_REQUESTED_WITH', $params) && $params['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                echo json_encode($output);
            }
            else {
                $this->render('index', $output);
            }
            return;
        }

        // MODEL
        $url = $this->request->params['url'];
        $products = new productModel($url);
        $products->init();

        $output['total'] = $products->total;
        $output['dublicated'] = $products->dublicated;
        
        if ($params['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
            $this->render('index', $output);
        }
        else {
            echo json_encode($output);
        }
    }
    
}
