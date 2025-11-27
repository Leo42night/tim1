<?php

namespace App\Models;

use App\Core\Model;

class Tamu extends Model {

    protected $table = "tamu";

    // Insert tamu baru
    public function tambahTamu($data) {
        $stmt = $this->db->prepare("
            INSERT INTO tamu (id_kegiatan, nama, tanggal_kunjungan, email) 
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['id_kegiatan'],
            $data['nama'],
            $data['tanggal_kunjungan'],
            $data['email'],
            
        ]);
    }

    public function getSemuaTamu() {
        $stmt = $this->db->prepare("SELECT * FROM tamu ORDER BY waktu DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
