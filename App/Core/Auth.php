<?php

namespace App\Core;

class Auth {

    public static function checkLogin() {
        if(!isset($_SESSION['admin'])) {
            header("Location: /Login");
            exit;
        }
    }

    public static function login($adminData) {
        $_SESSION['admin'] = $adminData;
    }

    public static function logout() {
        unset($_SESSION['admin']);
        session_destroy();
    }
}
