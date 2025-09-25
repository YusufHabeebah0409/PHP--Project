<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require('vendor/autoload.php');

require('config.php');
$loginDetails = json_decode(file_get_contents("php://input"));

$email = $loginDetails->email;
$password = $loginDetails->password;

// echo bin2hex(random_bytes(32));

$query = "SELECT * FROM `users` WHERE `email`='$email'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $payLoad = [
            'user_id' => $user['user_id'],
            'first_name' => $user['first_name'],
            'email' => $user['email'],
            'role' => 'user',
            'iat' => time(),
            'exp' => time() + 3600
        ];
        $token = JWT::encode($payLoad, $secretKey, 'HS256');
        $id = $user['user_id'];
        $updateQuery = "UPDATE users SET token='$token' WHERE user_id=$id";
        $check = mysqli_query($connection, $updateQuery);

        if($check){
        echo json_encode(['status' => true, 'message' => 'Login Successful', 'token' => $token]);
        }else{
            echo json_encode(['status' => false, 'message' => 'Login failed']);
        }

    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid Password']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'User does not exist']);
}