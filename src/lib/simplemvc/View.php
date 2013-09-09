<?php

namespace lib\simplemvc;

class View {
    
    private $prefix;
    private $ext = '.php';
    private $template;
    private $variables;
    private $oldpath;

    public function __construct($prefix = '/../../app/view/') {
        $this->prefix = $prefix;
    }

    /**
     * Developers should define init method for each view class;
     */
    public function render($view, $data) {
        extract($data);
        $this->template = $view . $this->ext;
        $this->setTemplatePath();
        
        if (file_exists($this->template)) {
            include $this->template;
        }
        else {
            // TODO: sholud implement
            include $this->render('error', new TemplateException());
        }

    }

    public function setTemplatePath() {
        $this->oldpath = get_include_path();
        $path = __DIR__ . $this->prefix;
        set_include_path(realpath($path));
    }

    public function resetTemplatePath() {
        set_include_path($this->oldpath);
    }

    public function set($name, $value) {
        $this->variables[$name] = $value;
        return $this;
    }

    public function get($name) {
        return $this->variables[$name];
    }
}

