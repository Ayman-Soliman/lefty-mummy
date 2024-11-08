<?php
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $dbname = 'lm_ecom';
// $host = 'localhost';
// $user = 'leftpsno_lefty-mummy';
// $pass = 'omar-hamza-ali-2011-2015-2019';
// $dbname = 'leftpsno_lm_ecom';
// echo $_SERVER['HTTP_HOST'];
if ($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    // Localhost environment
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'lm_ecom');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {
    // Live server environment
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'leftpsno_lm_ecom');
    define('DB_USER', 'leftpsno_lefty-mummy');
    define('DB_PASS', 'omar-hamza-ali-2011-2015-2019');
}

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$con->set_charset("utf8mb4");
if (!$con) {
    die('connection error:' . mysqli_connect_error());
}