<?php
require('config.php');
use Cloudinary\Api\Upload\UploadApi;

require('navbar.php');

$message = "";
$title = "";
$subtitle = "";
$content = "";
$image_url = "";

if (isset($_SESSION['post_title'])) {
    $title = $_SESSION['post_title'];
    $subtitle = $_SESSION['post_subtitle'];
    $content = $_SESSION['post_content'];
}

if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $content = $_POST['content'];

    $_SESSION['post_title'] = $title;
    $_SESSION['post_subtitle'] = $subtitle;
    $_SESSION['post_content'] = $content;

    if (empty($title) || empty($content)) {
        $message = "post must have a title and content";
    } else {
        if($_FILES['image']['tmp_name']){
            $result = (new UploadApi())->upload($_FILES['image']['tmp_name']);
            $image_url = $result['secure_url'];

        }

        $query = "INSERT INTO `posts`(`title`, `subtitle`, `content`) VALUES('$title', '$subtitle', '$content')";
        $savePost = mysqli_query($connection, $query);
        if ($savePost) {
            $message = "Post Upload successfully";
            $_SESSION['post_title'] = "";
            $_SESSION['post_subtitle'] = "";
            $_SESSION['post_content'] = "";
        } else {
            $message = "Error occurred While uploading post. Try Again";
        }
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
    <form action="create_post.php" method="post" class="card col-9 border border-0 mx-auto px-2 py-1 my-5" enctype="multipart/form-data">
        <div class="buttons">
            <button class="btn btn-secondary">Preview</button>
            <button class="btn btn-dark" type="submit" name="upload">Upload</button>
        </div>

        <?php
        echo "<p class='text-center text-danger'>$message</p>";
        ?>

        <img src="<?php echo $image_url; ?>" alt="">

        <input type="text" name="title" class="form-control border border-0 fs-2 fw-semibold mb-2" placeholder="Title" value="<?php echo $title; ?>">

        <input type="text" name="subtitle" class="form-control border border-0 fs-2 fw-semibold mb-2 " placeholder="Add a subtitle" value="<?php echo $subtitle; ?>">

        <!-- Tags  -->
        <textarea name="content" id="" class=" form-control border border-0" placeholder="Write your post here..." cols="30" rows="10"><?php echo $content; ?></textarea>


        <!-- <input type="file" name="image" class="form-control border border-0" placeholder="Upload an image" name="image[]" multiple>  -->
        <!-- <input type="file" name="image" class="form-control border border-0" placeholder="Upload an image" name="image" accept="*.png,.jpg,.jpeg"> -->
        <input type="file" name="image" class="form-control border border-0" placeholder="Upload an image" name="image">




    </form>
</body>

</html>