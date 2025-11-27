<?php

namespace App\Models;

use App\Core\Model;

class Kegiatan extends Model {

    protected $table = "kegiatan";

    // Fungsi Tambah Kegiatan
    public function tambahKegiatan($data) {
        $stmt = $this->db->prepare("
            INSERT INTO kegiatan (nama_kegiatan, tanggal_kegiatan, lokasi) 
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $data['nama_kegiatan'],
            $data['tanggal_kegiatan'],
            $data['lokasi']
        ]);
    }

    public function hapusKegiatan($id) {
        $stmt = $this->db->prepare("DELETE FROM kegiatan WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Fungsi Ambil Semua Data
    public function getSemuaKegiatan() {
        $stmt = $this->db->prepare("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}