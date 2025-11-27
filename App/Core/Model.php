<?php

namespace App\Core;

use PDO;
// Kita tidak perlu "use Config\Database" jika kita me-require manual di bawah, 
// tapi kita harus memanggil namespace lengkapnya.

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        // 1. Panggil file Class Database
        require_once __DIR__ . '/../../Config/Database.php';

        // 2. Gunakan method Static getInstance() dan getConnection()
        // Perhatikan: Kita panggil namespace \Config\Database sesuai isi file Database.php
        $this->db = \Config\Database::getInstance()->getConnection();
    }

    // ... sisa method all() dan find() biarkan sama ...
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