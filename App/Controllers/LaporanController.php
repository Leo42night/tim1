<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\ViewData;

class LaporanController extends Controller {

    protected $viewData;

    public function __construct() {
        $this->viewData = new ViewData();
    }

    public function rekap() {
        Auth::checkLogin();
        $rekap = $this->viewData->getRekapTamuPerKegiatan();
        $this->view('Admin/Laporan', ['title' => 'Rekap Kunjungan', 'rekap' => $rekap]);
    }
}
