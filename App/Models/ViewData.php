<?php

namespace App\Models;

use App\Core\Model;

class ViewData extends Model {

   public function getRekapTamuPerKegiatan() {
    $stmt = $this->db->prepare("
        SELECT 
        k.nama_kegiatan, 
        COUNT(t.id_tamu) AS total_tamu
        FROM kegiatan k
        LEFT JOIN tamu t 
        ON k.id = t.id
        GROUP BY k.id, k.nama_kegiatan

    ");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

    public function getStatistik() {
        $data = [];

        $data['total_tamu'] = $this->db->query("SELECT COUNT(*) FROM tamu")->fetchColumn();
        $data['total_kegiatan'] = $this->db->query("SELECT COUNT(*) FROM kegiatan")->fetchColumn();

        return $data;
    }
}
