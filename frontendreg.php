<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$json = file_get_contents("php://input");

$userDetails = json_decode($json);

// echo json_encode([$userDetails]);

$first_name = $userDetails['firstName'];
$last_name = $userDetails['lastName'];
$email = $userDetails['email'];
$hashed = password_hash($userDetails['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `hashed`) VALUES ('$first_name', '$last_name', '$email', '$hashed')";

?>