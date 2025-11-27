<?php

namespace App\Helpers;

class Helpers
{
    // Redirect sederhana
    public static function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }

    // Response JSON
    public static function json($data, $status = 200)
    {
        http_response_code($status);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit;
    }

    // Format tanggal (YYYY-MM-DD → dd/mm/yyyy)
    public static function tanggalIndo($tanggal)
    {
        if (!$tanggal) return '-';
        return date("d/m/Y", strtotime($tanggal));
    }

    // Escape output (menghindari XSS)
    public static function esc($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
