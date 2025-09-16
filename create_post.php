<?php
require('navbar.php');

$message = "";

if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $content = $_POST['content'];

    if(empty($title) || empty($content)){
        $message = "post must have a title and content";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <form action="create_post.php" method="post" class="card col-9 border border-none mx-auto px-2 py-1 my-5">
        <div class="buttons">
            <button class="btn btn-secondary">Preview</button>
            <button class="btn btn-dark" type="submit" name="upload">Upload</button>
        </div>

        <?php
        echo "<p class='text-center text-danger'>$message</p>";
        
        ?>

        <input type="text" name="title" class="form-control border border-0 fs-2 fw-semibold " placeholder="Title">

        <input type="text" name="subtitle" class="form-control border border-0 fs-2 fw-semibold" placeholder="Add a subtitle">

        <!-- Tags  -->
         <textarea name="content" id="" placeholder="Start Writing..." class="content form-control border border-0">

         </textarea>




     </form>
</body>
</html>