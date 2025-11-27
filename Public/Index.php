<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Simple autoload PSR-4 jika belum pakai composer autoload:
// composer.json sebaiknya sudah mengatur "App\\": "App/"

use App\Core\App;

// Jalankan router kecil
$app = new App();
