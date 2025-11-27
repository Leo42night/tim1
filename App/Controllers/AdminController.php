<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
use App\Core\Auth;
use App\Models\ViewData; 

class AdminController extends Controller {

    protected $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
    }

    public function index() {
        if(isset($_SESSION['admin'])) {
            $this->dashboard(); 
        } else {
            $this->login();
        }
    }

    public function login() {
        if(isset($_SESSION['admin'])) {
            $this->dashboard();
            exit;
        }
        $this->view('Admin/Login', ['title' => 'Login Admin']);
    }

    // --- BAGIAN INI YANG DIUBAH UNTUK BYPASS DATABASE ---
    public function doLogin() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // TENTUKAN USERNAME & PASSWORD YANG KAMU MAU DI SINI
        $user_rahasia = 'admin';
        $pass_rahasia = 'admin123'; // Password biasa (bukan hash)

        // Cek apakah inputan sama dengan yang kita tentukan?
        if($username === $user_rahasia && $password === $pass_rahasia) {
            
            // Karena tidak ambil dari database, kita buat data admin 'palsu' untuk sesi
            $adminData = [
                'id' => 999, // ID asal saja
                'username' => $user_rahasia,
                'nama' => 'Administrator'
            ];

            // Login Sukses
            Auth::login($adminData);
            header("Location: index.php?url=admin/dashboard");
            exit;

        } else {
            // Login Gagal
            $this->view('Admin/Login', [
                'title' => 'Login Admin', 
                'error' => 'Username atau password salah'
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        header("Location: index.php?url=admin/login");
        exit;
    }

    public function dashboard() {
        Auth::checkLogin(); 
        
        $stat = []; 
        if(class_exists('\App\Models\ViewData')) {
            $viewModel = new \App\Models\ViewData();
            $stat = $viewModel->getStatistik();
        }

        $this->view('Admin/Dashboard', ['title' => 'Dashboard', 'stat' => $stat]);
    }
}