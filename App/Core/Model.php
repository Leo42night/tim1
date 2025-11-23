<?php

namespace App\Core;

use PDO;

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = require __DIR__ . '/../../config/database.php';
    }
    // SELECT semua
    public function all() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // SELECT berdasarkan ID
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
