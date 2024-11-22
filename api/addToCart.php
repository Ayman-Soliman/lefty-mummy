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

    // Validate product ID
    if ($product_id <= 0) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid product ID']);
        exit;
    }
  
    try {
        // Check if the product is already in the cart
        $stmt = $pdo->prepare("SELECT id FROM carts WHERE user_id = :user_id AND prod_id = :product_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Product already in the cart
            echo json_encode(['message' => 'Product already in the cart']);
        } else {
            // Add product to the cart
            $stmt = $pdo->prepare("INSERT INTO carts (user_id, prod_id) VALUES (:user_id, :product_id)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            
            echo json_encode(['message' => 'Product added to cart']);
        }
    } catch (Exception $e) {
        // Handle exceptions
        http_response_code(500);
        echo json_encode(['message' => 'Server error', 'error' => $e->getMessage()]);
    }
    
}