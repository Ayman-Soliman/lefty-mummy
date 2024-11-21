<?php
// jwt.php: JWT token management
require 'vendor/autoload.php'; // Composer autoload

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = '94YM5'; // Replace with your secure secret key
$alg = 'HS256';           // Algorithm used for signing JWT

// Function to create a JWT
function createJWT($payload) {
    global $key, $alg;
    return JWT::encode($payload, $key, $alg);
}

// Function to validate and decode a JWT
function validateJWT($token) {
    global $key, $alg;
    try {
        return JWT::decode($token, new Key($key, $alg));
    } catch (Exception $e) {
        return null;
    }
}
