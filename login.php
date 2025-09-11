<?php
require('navbar.php');
$message = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $message = "Fill all fields";
    }else{
        $query = "SELECT * FROM `users` WHERE email='$email'";
        $foundUsers = mysqli_query($connection, $query);
        if(mysqli_num_rows($foundUsers) > 0){
            $user = mysqli_fetch_assoc($foundUsers);
            $passwordCheck = password_verify($password, $user['password']);
            if($passwordCheck){
                $message = "correct";
            }else{
                $message = "Incorrect password";
            }
        }else{
            $message = "Your account does not exist";
        }

    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>

 <div class=" card col-4 mx-auto shadow-sm my-5 px-2 py-1">
    <h3 class="text-center">Log In</h3>
    <?php
    echo "<p class='text-danger text-center'>$message</p>"
    
    ?>
    <form action="login.php" method="post">
        <div class="form-group mb-2">
            <label for=""> Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group mb-2">
            <label for=""> Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group mb-2">
            <button class="btn btn-dark btn-md px-3" name="login" type="submit"> Log In</button>
        </div>
    </form>

 </div>
    
</body>
</html>