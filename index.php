<?php
session_start();
print_r($_POST);
echo("###");
print_r($_FILES);
echo("###");


require_once 'image_manipulation.php';
print_r($_SESSION);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Image Uploader and Manipulator</title>

        <link src="styles/main.css" rel="stylesheet">
    </head>

    <body>

        <h1>Image Uploader and Manipulator</h1>

        <?php
        if(isset($error)) {
            echo '<p id="error">' . $error . '</p>';
        }
        ?>


        <?php
        if (!isset($_SESSION['newPath']) || isset($_GET['true'])) {
        ?>


        <form id="imgForm" method="POST" action="index.php" enctype="multipart/form-data">

            <label for="img_upload">Image on your computer to upload</label>
            <input id="img_upload" type="file" name="img_upload" >

            <label for="img_name">Give this image a name</label>
            <input id="img_name" type="text" name="img_name">

            <input type="submit" name="upload_form_submitted">
        </form>

        <?php
        } else {
            echo '<img src="' . $_SESSION['newPath'] . '"/>';
        }
        ?>

        <script src="js/app.js" type="text/javascript"></script>
    </body>
</html>
