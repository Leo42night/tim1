<?php

namespace App\Models;

use App\Core\Model;

class Admin extends Model {

    protected $table = "admin";

    public function getByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function login($username, $password) {
        $admin = $this->getByUsername($username);
        if(!$admin) return false;

        if(password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
}
