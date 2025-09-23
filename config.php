<?php
 $connection = mysqli_connect('localhost', 'root', '', 'blog_db');

 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$secretKey = '9726af86fb03779b8b5fc78cbfe0992622a85b05b6d3cdaff081ccad8a2c795c';
?>