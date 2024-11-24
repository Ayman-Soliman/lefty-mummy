<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$con->set_charset("utf8mb4");
if (!$con) {
    die('connection error:' . mysqli_connect_error());
}
