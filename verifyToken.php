<?php

require('config.php');

$details = file_get_contents('php://input');
$tokenDetails = json_decode($details);
$id = $tokenDetails->user_id;

$query = "SELECT * FROM `users` WHERE `user_id`='$id'";

$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if($user['token'] === $tokenDetails->token){
        echo json_encode(['status' => true, 'message' => 'Token verified', 'token' => $tokenDetails->token]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid token, please login again']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Session expired, please login again']);
}