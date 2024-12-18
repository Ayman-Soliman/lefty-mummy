<!--  -->
{ "product_id": "15" },
        {
          headers: {
            Authorization: "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2xlZnR5LW11bW15LmNvbS8iLCJhdWQiOiJodHRwczovL2xlZnR5LW11bW15LmNvbS8iLCJpYXQiOjE3MzIyNjI4NjQsImV4cCI6MTczMjI2NjQ2NCwidXNlcl9pZCI6MX0.DYb1j_fv-CQ2EGVqWMFA7jf-vfH05fD7GRGyd5RMrO0",
          },
        }
<!--  -->


Here’s the updated and fully explained guide using the Composer autoloader for PHP and detailing how to integrate React Native with the API. Each step includes file structures, code snippets, and thorough explanations for both PHP and React Native.

Step 1: Setting Up the MySQL Database
Follow the same schema setup for your database as in the earlier example. Ensure you have these tables in your MySQL database:

users (for authentication)
products (for listing products)
cart (user-specific cart)
wishlist (user-specific wishlist)

Step 2: Installing Dependencies for PHP
Install Composer if you don’t have it. Follow this guide for installation.
Install the Firebase JWT library:

composer require firebase/php-jwt

Composer will create a vendor/ directory and an autoload.php file to include all dependencies.

Step 3: Create PHP API Files
File Structure
Here’s the suggested structure for your API:

    api/
├── config.php
├── jwt.php
├── login.php
├── products.php
├── cart.php
├── wishlist.php
├── vendor/       <-- Generated by Composer
│   └── autoload.php
a) config.php (Database Connection)
<?php
// config.php: Database configuration
$host = 'localhost';
$db_name = 'your_database_name';
$username = 'your_database_user';
$password = 'your_database_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

Explanation:

Establishes a connection to your MySQL database using PDO.
Errors are configured to throw exceptions for better debugging.

b) jwt.php (JWT Helper Functions)
<?php
// jwt.php: JWT token management
require 'vendor/autoload.php'; // Composer autoload

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'your_secret_key'; // Replace with your secure secret key
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
?>
Explanation:

Includes Firebase JWT via Composer's autoloader.
createJWT: Generates a token with a payload (e.g., user_id, exp for expiry).
validateJWT: Decodes and validates the token using the secret key.

c) login.php (User Login and Authentication)
<?php
require 'config.php';
require 'jwt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $username = $data->username ?? '';
    $password = $data->password ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $payload = ['user_id' => $user['id'], 'exp' => time() + 3600];
        $token = createJWT($payload);
        echo json_encode(['token' => $token]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Invalid credentials']);
    }
}
?>

Explanation:

Accepts username and password as input.
Validates user credentials against the database.
Generates a JWT token with user_id and an expiration time (exp).
Returns the token or an error message.

d) products.php (Public Endpoint to Get Products)

<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
}
?>
Explanation:

Retrieves all products from the products table.
No authentication is required, as this endpoint is public.

e) cart.php (Protected Endpoint to Add to Cart)
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

    $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id) VALUES (:user_id, :product_id)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();

    echo json_encode(['message' => 'Product added to cart']);
}
?>
Explanation:

Validates the Authorization token.
Uses user_id from the token payload to add a product to the cart.

Step 4: React Native Integration
File Structure
src/
├── api/
│   ├── axiosConfig.js
│   ├── authApi.js
│   └── productApi.js
├── screens/
│   ├── LoginScreen.js
│   ├── ProductScreen.js
│   └── CartScreen.js

a) axiosConfig.js

import axios from 'axios';

const API = axios.create({
  baseURL: 'http://your-api-url',
});

export default API;

Explanation:

Configures Axios with the base URL of your API.

b) authApi.js
import API from './axiosConfig';

export const login = async (username, password) => {
  try {
    const response = await API.post('/login.php', { username, password });
    return response.data.token;
  } catch (error) {
    throw new Error(error.response?.data?.message || 'Login failed');
  }
};
Explanation:

Sends a POST request to the login.php endpoint.
Returns the JWT token if successful.

c) productApi.js
import API from './axiosConfig';

export const fetchProducts = async () => {
  try {
    const response = await API.get('/products.php');
    return response.data;
  } catch (error) {
    throw new Error('Failed to fetch products');
  }
};
Explanation:

Sends a GET request to fetch product data.
d) Example LoginScreen.js
import React, { useState } from 'react';
import { View, Text, TextInput, Button } from 'react-native';
import { login } from '../api/authApi';

const LoginScreen = ({ navigation }) => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = async () => {
    try {
      const token = await login(username, password);
      await AsyncStorage.setItem('token', token);
      navigation.navigate('ProductScreen');
    } catch (error) {
      alert(error.message);
    }
  };

  return (
    <View>
      <Text>Login</Text>
      <TextInput placeholder="Username" onChangeText={setUsername} />
      <TextInput placeholder="Password" onChangeText={setPassword} secureTextEntry />
      <Button title="Login" onPress={handleLogin} />
    </View>
  );
};

export default LoginScreen;

