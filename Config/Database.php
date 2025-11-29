<?php

namespace Config;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database {

    private static $instance = null;
    private $connection;

    private function __construct() {

        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); // load dari file .env, bisa di akses pakai $_ENV, $_SERVER, atau getenv()

        $type = $_ENV['DB_TYPE'] ?? "mysql";
        $host = $_ENV['DB_HOST'] ?? "localhost";
        $port = $_ENV['DB_PORT'] ?? "3306";
        $dbname = $_ENV['DB_NAME'] ?? "buku_tamu";
        $sslmode = $_ENV['DB_SSLMODE'] ?? ""; // vercel postgres pakai require
        $user = $_ENV['DB_USER'] ?? "root";
        $pass = $_ENV['DB_PASS'] ?? "";

        try {
            $this->connection = new PDO(
                "$type:host=$host;port=$port;dbname=$dbname;sslmode=$sslmode",
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
