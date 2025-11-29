<?php

namespace App\Models;

use App\Core\Model;

class Tamu extends Model {

    protected $table = "tamu";

    // Insert tamu baru
    public function tambahTamu($data) {
        $stmt = $this->db->prepare("
            INSERT INTO tamu (id, nama, tanggal_kunjungan, email) 
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['id'],
            $data['nama'],
            $data['tanggal_kunjungan'],
            $data['email'],
            
        ]);
    }

    public function getSemuaTamu() {
    $stmt = $this->db->prepare("SELECT * FROM tamu ORDER BY tanggal_kunjungan DESC");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
