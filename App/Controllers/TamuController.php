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
        $this->view('Tamu/Form-Input', ['title' => 'Buku Tamu']);
    }

    // Proses simpan tamu
    public function simpan() {
        // 1. Ambil data dari form HTML
        // Pastikan name di HTML adalah "id_kegiatan"
        $idkegiatan = $_POST['id_kegiatan'] ?? null;
        $nama       = $_POST['nama'] ?? '';
        $tanggal    = $_POST['tanggal_kunjungan'] ?? date('Y-m-d');
        $email      = $_POST['email'] ?? '';

        // 2. VALIDASI KEAMANAN: Cek apakah ID Kegiatan benar-benar ANGKA?
        // Database Anda (INT) akan error fatal jika menerima string kosong "".
        if (!is_numeric($idkegiatan)) {
            // Tampilkan pesan alert dan kembalikan user ke halaman sebelumnya
            echo "<script>
                    alert('Gagal! Anda wajib memilih Kegiatan yang valid.');
                    window.history.back();
                  </script>";
            exit; // Stop proses agar tidak lanjut ke database
        }

        // 3. Validasi Nama
        if(trim($nama) == '') {
            echo "<script>alert('Nama wajib diisi.'); window.history.back();</script>";
            exit;
        }

        // 4. Susun Data untuk Model
        // PENTING: Kunci array di sini harus sama persis dengan yang diminta di Model Tamu.php
        $data = [
            'id_kegiatan'       => $idkegiatan, // <-- Kunci ini yang diperbaiki
            'nama'              => $nama,
            'tanggal_kunjungan' => $tanggal,
            'email'             => $email
        ];

        // 5. Eksekusi Simpan
        try {
            $saved = $this->tamuModel->tambahTamu($data);

            if($saved) {
                // Berhasil
                $this->view('Tamu/thanks', ['title' => 'Terima Kasih']);
            } else {
                echo "Gagal menyimpan data tamu.";
            }
        } catch (\Exception $e) {
            // Jika masih ada error database lain, tampilkan pesannya
            echo "Terjadi kesalahan sistem: " . $e->getMessage();
        }
    }

    public function daftar() {
        $tamu = $this->tamuModel->getSemuaTamu();
        $this->view('Admin/DaftarTamu', ['title' => 'Daftar Tamu', 'tamu' => $tamu]);
    }
}