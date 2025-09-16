<?php 
require('navbar.php');
session_start();
$user = $_SESSION['loggedInUser'];

if(!$user){
  header('location: login.php');
}


if(isset($_POST['logout'])){
    session_unset();
    header('location:login.php');

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Welcome to the dashboard! <?php echo $user['first_name']; ?></p>
    <form action="dashboard.php" method="post">
        <button class="btn btn-danger" name="logout" type="submit">Log out</button>
    </form>
</body>
</html>