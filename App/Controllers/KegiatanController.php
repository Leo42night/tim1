<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Kegiatan;
use App\Core\Auth;

class KegiatanController extends Controller {

    protected $kegiatanModel;

    public function __construct() {
        Auth::checkLogin();
        $this->kegiatanModel = new Kegiatan();
    }

    public function index() {
        $keg = $this->kegiatanModel->getSemuaKegiatan();

        $this->view('Admin/Kegiatan', [
            'title' => 'Manajemen Kegiatan',
            'kegiatan' => $keg
        ]);
    }

    public function simpan() {
        $data = [
            'nama_kegiatan'    => $_POST['nama_kegiatan'] ?? '', 
            'tanggal_kegiatan' => $_POST['tanggal_kegiatan'] ?? '',       
            'lokasi'           => $_POST['lokasi'] ?? ''
        ];

        $this->kegiatanModel->tambahKegiatan($data);

        header("Location: /kegiatan");
        exit;
    }

    public function hapus($id = null) {
        if($id) {
            $this->kegiatanModel->hapusKegiatan($id);
        }

        header("Location: /kegiatan");
        exit;
    }

    public function edit($id) {
        $data['title'] = "Edit Kegiatan";
        $data['mode'] = "edit";
        $data['kegiatan'] = $this->kegiatanModel->getKegiatanById($id);

        if(!$data['kegiatan']) {
            echo "Data kegiatan tidak ditemukan.";
            exit;
        }

        $this->view('Admin/Form-Kegiatan', $data);
    }

    public function update() {   // ← FIXED!!
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: /kegiatan");
            exit;
        }

        $id = $_POST["id"] ?? null;

        if (!$id) {
            echo "ID kegiatan tidak ditemukan. Form edit rusak.";
            exit;
        }

        $data = [
            "nama_kegiatan" => $_POST["nama_kegiatan"] ?? '',
            "tanggal_kegiatan" => $_POST["tanggal_kegiatan"] ?? '',
            "lokasi" => $_POST["lokasi"] ?? ''
        ];

        if ($this->kegiatanModel->updateKegiatan($id, $data)) {
            header("Location: /kegiatan");
            exit;
        } else {
            echo "Gagal update";
        }
    }
}
