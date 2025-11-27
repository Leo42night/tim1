<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Kegiatan;
use App\Core\Auth;

class KegiatanController extends Controller {

    protected $kegiatanModel;

    public function __construct() {
        // Cek login admin
        Auth::checkLogin();
        $this->kegiatanModel = new Kegiatan();
    }

    public function index() {
        // Ambil data dari model
        $keg = $this->kegiatanModel->getSemuaKegiatan();
        
        $this->view('Admin/Kegiatan', [
            'title' => 'Manajemen Kegiatan', 
            'kegiatan' => $keg
        ]);
    }

    public function simpan() {
        $data = [
            'nama_kegiatan' => $_POST['nama_kegiatan'] ?? '', 
            'tanggal_kegiatan'       => $_POST['tanggal_kegiatan'] ?? '',       
            'lokasi'        => $_POST['lokasi'] ?? ''
        ];

        $this->kegiatanModel->tambahKegiatan($data);

        header("Location: index.php?url=kegiatan/index");
        exit;
    }

    public function hapus($id = null) {
        if($id) {
            $this->kegiatanModel->hapusKegiatan($id);
        }
        
        header("Location: index.php?url=kegiatan/index");
        exit;
    }
}