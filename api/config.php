<?php
// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Preflight request
    header("HTTP/1.1 200 OK");
    exit();
}

// Main API logic
// echo json_encode(["message" => "CORS is configured!"]);

// config.php: Database configuration
// if ($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
//     // Localhost environment
//     define('DB_HOST', 'localhost');
//     define('DB_NAME', 'lm_ecom');
//     define('DB_USER', 'root');
//     define('DB_PASS', '');
// } else {
//     // Live server environment
//     define('DB_HOST', 'localhost');
//     define('DB_NAME', 'leftpsno_lm_ecom');
//     define('DB_USER', 'leftpsno_lefty-mummy');
//     define('DB_PASS', 'omar-hamza-ali-2011-2015-2019');
// }
define('DB_HOST', 'localhost');
define('DB_NAME', 'leftpsno_lm_ecom');
define('DB_USER', 'leftpsno_lefty-mummy');
define('DB_PASS', 'omar-hamza-ali-2011-2015-2019');

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
