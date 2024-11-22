<?php
require 'config.php';
require 'jwt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $headers = getallheaders();
    $token = $headers['Authorization'] ?? null;

    if (!$token || !($decoded = validateJWT($token))) {
        http_response_code(401);
        echo json_encode(['message' => 'Unauthorized']);
        exit;
    }

    $user_id = $decoded->user_id;
    $data = json_decode(file_get_contents("php://input"));
    $product_id = $data->product_id ?? 0;

    $stmt = $pdo->prepare("INSERT INTO carts (user_id, prod_id) VALUES (:user_id, :product_id)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();

    echo json_encode(['message' => 'Product added to cart']);
    
}