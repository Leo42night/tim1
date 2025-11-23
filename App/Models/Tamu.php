<?php

namespace App\Models;

use App\Core\Model;

class Tamu extends Model {

    protected $table = "tamu";

    // Insert tamu baru
    public function tambahTamu($data) {
        $stmt = $this->db->prepare("
            INSERT INTO tamu (nama, instansi, keperluan, waktu, id_kegiatan) 
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['nama'],
            $data['instansi'],
            $data['keperluan'],
            $data['waktu'],
            $data['id_kegiatan']
        ]);
    }

    public function getSemuaTamu() {
        $stmt = $this->db->prepare("SELECT * FROM tamu ORDER BY waktu DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
