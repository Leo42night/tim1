<?php

namespace App\Core;

class Controller {

    public function view($file, $data = []) {
        extract($data);

        $path = "../App/Views/" . $file . ".php";
        if(file_exists($path)) {
            require $path;
        } else {
            echo "View '$file' tidak ditemukan.";
        }
    }
}
