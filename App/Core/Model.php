<?php

namespace App\Core;

use PDO;

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        require_once __DIR__ . '/../../Config/Database.php';


        $this->db = \Config\Database::getInstance()->getConnection();
    }


    public function all() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}