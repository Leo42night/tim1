<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Kegiatan;
use App\Core\Auth;

class KegiatanController extends Controller {

    protected $kegiatanModel;

    public function __construct() {
        $this->kegiatanModel = new Kegiatan();
    }

    // list kegiatan (admin)
    public function index() {
        Auth::checkLogin();
        $keg = $this->kegiatanModel->getSemuaKegiatan();
        $this->view('Admin/Kegiatan', ['title' => 'Manajemen Kegiatan', 'kegiatan' => $keg]);
    }

    public function simpan() {
        Auth::checkLogin();
        $data = [
            'judul' => $_POST['namakegiatan'] ?? '',
            'tanggal' => $_POST['tanggal_kegiatan'] ?? '',
            'lokasi' => $_POST['lokasi'] ?? ''
        ];
        $this->kegiatanModel->tambahKegiatan($data);
        header("Location: /Kegiatan");
        exit;
    }

    public function hapus($id = null) {
        Auth::checkLogin();
        if($id) {
            $this->kegiatanModel->hapusKegiatan($id);
        }
        header("Location: /Kegiatan");
        exit;
    }
}
