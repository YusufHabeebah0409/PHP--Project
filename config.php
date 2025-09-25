<?php
require('vendor/autoload.php');
use Cloudinary\Configuration\Configuration;
 $connection = mysqli_connect('localhost', 'root', '', 'blog_db');

 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$secretKey = '9726af86fb03779b8b5fc78cbfe0992622a85b05b6d3cdaff081ccad8a2c795c';
Configuration::instance([
    'cloud'=> [
        'cloud_name' => 'doqkuioek',
        'api_secret' => 'qE-05KGg_rLHjfwtNZu3jKyKFy0',

        'api_key' => '677336142318817'
    ],
    'url' => [
        'secure' => true
    ]
])
?>