<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require('autoload.php');

require('config.php');
$loginDetails = json_decode(file_get_contents("php://input"));

$email = $loginDetails->email;
$password = $loginDetails->password;

$query = "SELECT * FROM `users` WHERE `email`='$email'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        echo json_encode(['status' => true, 'message' => 'Login Successful']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid Password']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'User does not exist']);
}