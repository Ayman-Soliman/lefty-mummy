<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM products ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $data = []; // Array to store results
        while ($row = mysqli_fetch_assoc($query_run)) {
            $data[] = $row; // Append each row to the array
        }
    
        echo json_encode($data); // Encode the array into JSON format
    } else {
        echo json_encode(["error" => "Query failed: " . mysqli_error($con)]);
    }
}