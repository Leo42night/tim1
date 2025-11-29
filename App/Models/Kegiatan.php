<?php

namespace App\Models;

use App\Core\Model;

class Kegiatan extends Model {

    protected $table = "kegiatan";

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

    public function getSemuaKegiatan() {
        $stmt = $this->db->prepare("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getKegiatanById($id) {
        $stmt = $this->db->prepare("SELECT * FROM kegiatan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateKegiatan($id, $data) {
        $sql = "
            UPDATE kegiatan SET 
                nama_kegiatan = ?, 
                tanggal_kegiatan = ?, 
                lokasi = ?
            WHERE id = ?
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
        $data['nama_kegiatan'],
        $data['tanggal_kegiatan'],
        $data['lokasi'],
        $id
    ]);
    }
}