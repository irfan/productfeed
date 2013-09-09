<?php
namespace app\model;

use lib\simplemvc\ModelAbstract;

/**
 * TODO: XML parser should be another class, sorry no time.
 */

class productModel extends ModelAbstract {
    
    protected $datapath = "/../../../data/";
    protected $data;
    protected $xml;
    protected $maxsize = 8192;
    protected $parser;
    
    public $total = 0;
    public $dublicated = 0;

    private $node;
    private $attributes;
    private $handlenodes = array(
        'name' => '',
        'productid' => '',
        'description' => '',
        'price' => '',
        'currency' => '',
        'category' => '',
        'producturl' => ''
    );

    public function __construct($xml) {
        $this->xml = $xml;
        $this->parser = xml_parser_create('UTF-8');
        xml_set_object($this->parser, $this);
        xml_set_character_data_handler($this->parser, 'xmlNode');
        xml_set_element_handler($this->parser, 'startTag', 'endTag');
    }

    public function isUrlValid() {
        // TODO: should implement
        return true;
    }

    public function init() {
        $file = fopen($this->xml, 'r');
        if (!$file) {
            throw new NetworkErrorException();
        }

        while (!feof($file)) {
            $xml = fread($file, $this->maxsize);
            xml_parse($this->parser, $xml, feof($file));
        }

        fclose($file);
         
    }

    public function xmlNode($parser, $xmlNode) {
        if (array_key_exists($this->node, $this->handlenodes)) {
            switch ($this->node) {
                case 'producturl':
                    $this->handlenodes[$this->node] = $this->handlenodes[$this->node] . urldecode($xmlNode);
                    break;
                default:
                    $this->handlenodes[$this->node] = trim($this->handlenodes[$this->node] . ' ' . $xmlNode);
                    break;
            }
        }
    }

    public function startTag($parser, $name, $attributes) {
        $name = strtolower($name);
        $this->node = $name;
        $this->attributes = $attributes;

        if (array_key_exists($this->node, $this->handlenodes)) {
            switch($this->node) {
                case 'price':
                    $this->handlenodes[$name] = $attributes['CURRENCY'] ;
                    break;
                default:
                    break;
            }
        }
    }
    
    public function endTag($parser, $name) {
        $name = strtolower($name);
        if ($name === 'product') {
            // var_dump($this->handlenodes);
            $this->productTxtWriter();
            foreach($this->handlenodes as $key => $value) {
                $this->handlenodes[$key] = '';
            }
        }
    }
    
    // TODO: should be another class, no time sorry
    public function productTxtWriter() {
        $path = realpath(__DIR__ . $this->datapath);
        $fname = $path . '/' . preg_replace('/\//', '_', $this->handlenodes['productid']) . '.txt';

        if (file_exists($fname)) {
        /*
            // TODO: exception class should be defined
            throw new FileExistsException();
            return;
         */
            $this->dublicated++;
        }
        
        if (!file_exists($fname)) {
            $product = $this->handlenodes;

            $data  = 'Product: ' . $product['name'] . ' (' . $product['productid'] . ')' . PHP_EOL;
            $data .= 'Description: ' . $product['description'] . PHP_EOL;
            $data .= 'Price: ' . $product['price'] . PHP_EOL;
            $data .= 'Categories: ' . $product['category'] . PHP_EOL;
            $data .= 'URL: ' . $product['producturl'] . PHP_EOL; 
            
            $fp = fopen($fname, 'w');
            fwrite($fp, $data);
            fclose($fp);
            $this->total++;
        }
    }

}


