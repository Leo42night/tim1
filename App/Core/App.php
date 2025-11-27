<?php

namespace App\Core;

class App {

    protected $controller = 'TamuController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // controller
        if(file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        $this->controller = "App\\Controllers\\" . $this->controller;
        $this->controller = new $this->controller;

        // method
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // params
        $this->params = $url ? array_values($url) : [];

        // eksekusi
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if(isset($_GET['url'])) {
            $url = explode('/', rtrim($_GET['url'], '/'));
            return filter_var_array($url, FILTER_SANITIZE_URL);
        }
    }
}
