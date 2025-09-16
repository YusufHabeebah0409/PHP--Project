<?php 
require('navbar.php');
session_start();
$user = $_SESSION['loggedInUser'];

if(!$user){
  header('location: login.php');
}


if(isset($_POST['logout'])){
    $_SESSION['loggedInUser'] = "";
    // session_unset();
    header('location:login.php');

}

if(isset($_POST['create_post'])){
   header('location: create_post.php');

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
    <p class="text-center">Welcome to the dashboard! <?php echo $user['first_name']; ?></p>
    <form action="dashboard.php" method="post">
        <button class="btn btn-danger" name="logout" type="submit">Log out</button>
    </form>

    <form action="dashboard.php" method="post">
        <button type="submit" name="create_post">Create post</button>
    </form>



</body>
</html>