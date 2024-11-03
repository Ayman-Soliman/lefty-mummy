<?php
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $dbname = 'lm_ecom';
$host = 'localhost';
$user = 'leftpsno_lefty-mummy';
$pass = 'omar-hamza-ali-2011-2015-2019';
$dbname = 'leftpsno_lm_ecom';

$con = mysqli_connect($host,$user,$pass,$dbname);

if (!$con) {
    die('connection error:' . mysqli_connect_error());
}