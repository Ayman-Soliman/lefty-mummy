<?php
require 'config.php';
require 'jwt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $username = $data->username ?? '';
    $password = $data->password ?? '';
    $hashed_pass = sha1($password);
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($hashed_pass, $user['password'])) {
        $payload = ['user_id' => $user['id'], 'exp' => time() + 3600];
        $token = createJWT($payload);
        echo json_encode(['token' => $token]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Invalid credentials']);
    }
}
