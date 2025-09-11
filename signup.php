<?php
$message = "";
$passwordMsg = "";
$status = null;
if (isset($_POST['submit'])) {
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    if (empty($first) || empty($last) || empty($email) || empty($password)) {
        $message = "All fields are required" . '<br>';
        $status = false;
    } elseif (strlen($password) < 8) {
        $passwordMsg = " Password cannot be less than 8 characters";
        $status = false;
    } else {
        $connection = mysqli_connect('localhost', 'root', '', 'blog_db');
        $checkQuery = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($connection, $checkQuery);
        if ($result->num_rows > 0) {
            $message = "Email already exists";
        } else {
            $query = "INSERT INTO `users`(`first_name`,`last_name`,`email`, `password`) VALUES ('$first','$last','$email','$hashed')";
            mysqli_query($connection, $query);
            header("Location: login.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="signup.php" class="card col-6 mx-auto px-1 py-2 my-5" method="post">
        <h5 class="text-center my-2">Registration Form</h5>
        <?php
        if (isset($_POST['submit']) && $status === true) {
            echo "<p class='text-center text-success'>$message</p>";
        } else {
            echo "<p class='text-center text-danger'>$message</p>";
        }

        ?>
        <div class="form-group mb-2">
            <label for=""> First Name</label>
            <input type="text" class="form-control" name="firstName">
        </div>
        <div class="form-group mb-2">
            <label for=""> Last Name</label>
            <input type="text" class="form-control" name="lastName">
        </div>
        <div class="form-group mb-2">
            <label for=""> Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group mb-2">
            <label for=""> Password</label>
            <input type="password" class="form-control" name="password">
            <?php
            echo "<p class=' text-danger'>$passwordMsg</p>";
            ?>
        </div>
        <div class="form-group mb-2">
            <button class="btn btn-dark btn-md px-3" name="submit" type="submit"> Submit</button>
        </div>
    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>