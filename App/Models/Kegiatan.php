<?php

namespace App\Models;

use App\Core\Model;

class Kegiatan extends Model {

    protected $table = "kegiatan";

    public function tambahKegiatan($data) {
        $stmt = $this->db->prepare("
            INSERT INTO kegiatan (judul, tanggal, lokasi)
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $data['judul'],
            $data['tanggal'],
            $data['lokasi']
        ]);
    }

    public function hapusKegiatan($id) {
        $stmt = $this->db->prepare("DELETE FROM kegiatan WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getSemuaKegiatan() {
        return $this->all();
    }
}
