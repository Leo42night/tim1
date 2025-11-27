<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
use App\Core\Auth;

class AdminController extends Controller {

    protected $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
    }

    public function login() {
        // jika sudah login redirect ke dashboard
        if(isset($_SESSION['admin'])) {
            header("Location: /Dashboard");
            exit;
        }
        $this->view('Admin/Login', ['title' => 'Login Admin']);
    }

    public function doLogin() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $admin = $this->adminModel->login($username, $password);
        if($admin) {
            Auth::login($admin);
            header("Location: /Dashboard");
            exit;
        } else {
            // bisa kirim pesan error, untuk sederhana:
            $this->view('Admin/Login', ['title' => 'Login Admin', 'error' => 'Username atau password salah']);
        }
    }

    public function logout() {
        Auth::logout();
        header("Location: /Login");
        exit;
    }

    public function dashboard() {
        Auth::checkLogin();
        // contoh: ambil statistik via ViewData model
        $viewModel = new \App\Models\ViewData();
        $stat = $viewModel->getStatistik();
        $this->view('Admin/Dashboard', ['title' => 'Dashboard', 'stat' => $stat]);
    }
}
