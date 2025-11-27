<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tamu;

class TamuController extends Controller {

    protected $tamuModel;

    public function __construct() {
        $this->tamuModel = new Tamu();
    }

    // Halaman form tamu (public)
    public function index() {
        // tampilkan form tamu
        $this->view('Tamu/Form-input', ['title' => 'Buku Tamu']);
    }

    // Proses simpan tamu
    public function simpan() {
        // ambil data POST
        $nama = $_POST['nama'] ?? '';
        $tanggal = $_POST['tanggal_kunjungan'] ?? date('Y-m-d');
        $email = $_POST['email'] ?? '';
        $idkegiatan = $_POST['idkegiatan'] ?? null;

        // minimal validasi sederhana
        if(trim($nama) == '' || trim($tanggal) == '') {
            // bisa redirect balik dengan pesan error (sederhana: echo)
            echo "Nama dan tanggal wajib diisi.";
            exit;
        }

        $data = [
            'nama' => $nama,
            'tanggal_kunjungan' => $tanggal,
            'email' => $email,
            'idkegiatan' => $idkegiatan
        ];

        $saved = $this->tamuModel->tambahTamu($data);

        if($saved) {
            // tampilkan halaman terima kasih
            $this->view('Tamu/thanks', ['title' => 'Terima Kasih']);
        } else {
            echo "Gagal menyimpan data tamu.";
        }
    }

    // Hanya admin bisa lihat daftar tamu - akses diperiksa di controller admin (atau middleware)
    public function daftar() {
        $tamu = $this->tamuModel->getSemuaTamu();
        $this->view('Admin/Daftar-tamu', ['title' => 'Daftar Tamu', 'tamu' => $tamu]);
    }
}
