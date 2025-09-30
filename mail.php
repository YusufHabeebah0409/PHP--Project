<?php
require('config.php');
require('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();          
$mail->isSMTP();                 
$mail->Host       = $host;
$mail->SMTPAuth   = true;
$mail->Username   = $username; 
$mail->Password   = $mail_password;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;           
$mail->setFrom($username, 'SQI College of ICT');
$mail->addAddress('ojuolapehabeebah@gmail.com', 'Habeebah');

$mail->isHTML(true);               
$mail->Subject = 'Test email from PHPMailer';
$mail->Body    = '<h1>Hello</h1><p>This is a test.</p>';
$mail->AltBody = 'Hello - this is a test (plain text).';



