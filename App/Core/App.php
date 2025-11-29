<?php

namespace App\Core;

class App {

    protected $controller = 'TamuController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        if(isset($url[0]) && file_exists('../App/Controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../App/Controllers/' . $this->controller . '.php';
        $this->controller = "App\\Controllers\\" . $this->controller;
        $this->controller = new $this->controller;

        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // PARAMS
        if(!empty($url)) {
            $this->params = array_values($url);
        }

        // EKSEKUSI
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode('/', $url);
    }
    return [];
   }
}