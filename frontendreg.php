<?php

require('config.php');

$json = file_get_contents("php://input");

$userDetails = json_decode($json);
$first_name = $userDetails->firstName;
$last_name = $userDetails->lastName;
$email = $userDetails->email;
$password = $userDetails->password;

$hashed = password_hash($password, PASSWORD_DEFAULT);
$query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES ('$first_name', '$last_name', '$email', '$hashed')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo json_encode(['status' => true, 'message' => 'Account Created Successfully']);
} else {
    echo json_encode(['status' => false, 'message' => 'Error occurred while creating account. Please try again later']);
}
?>