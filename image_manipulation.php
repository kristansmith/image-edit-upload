<?php

if (!isset($_POST['upload_form_submitted'])){

    if (!isset($_FILES['img_upload']) || empty($_FILES['img_upload']['name'])){
        $error = "Error: You didn't upload a file";
    } else if (!isset($_POST['img_name']) || empty($_FILES['img_upload'])) {
        $error = "Error: You didn't specify a file name";
    } else {
        $allowMIMEs = array('image/jpeg', 'image/gif', "image/png");
        foreach ($allowedMIMEs as $mime) {
            if ($mime == $_FILES['img_upload']['type']) {
                $mimeSplitter = explode('/', $mime);
                $fileExt = $mimeSplitter[1];
                $newPath = 'img/' . $_POST['img_name'] . '.' . $fileExt;

                break;
            }
        }

        if (file_exists($newPath)) {
            $error = "Error: A file already exists with that name";
        } else if (!isset($newPath)) {
            $error = 'Error: Invalid file format';
        } else if (!copy($_FILES['img_upload']['tmp_name'], $newPath)) {
            $error = "Error: Could not save file";
        } else {

            $_SESSION['newPath'] = $newPath;
            $_SESSION['fileExt'] = $fileExt;
        }
    }
}

?>
