<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM 'products' WHERE status = '1'";
    $query_run = mysqli_query($con, $query);
    // return $query_run;
    echo json_encode($query_run);
}