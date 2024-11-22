<?php
require 'config.php';
require 'jwt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $email = $data->email ?? '';
    $password = $data->password ?? '';
    $hashed_pass = sha1($password);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user && $hashed_pass === $user['password']) {
        $payload = [
            "iss" => "https://lefty-mummy.com/",
            "aud" => "https://lefty-mummy.com/",
            "iat" => time(),
            "exp" => time() + (60 * 60), // Token expires in 1 hour
            "user_id" => $user['id']
        ];

        // $payload = ['user_id' => $user['id'], 'exp' => time() + 3600];
        $token = createJWT($payload);
        echo json_encode(['token' => $token]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Invalid credentials']);
        
    }
}
