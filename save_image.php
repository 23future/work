<?php
/*
author: beepin.eu
save image into storage path and return name of file
*/
// TODO: put here session to load session and then save file into it !
if(isset($_FILES['img_file'])){

    $img_file = $_FILES["img_file"]["name"];
    $folderName = "/storage/post_img/";
    //$folderName = "/tmp/";
    $validExt = array("jpg", "png", "jpeg", "bmp", "gif");
    $msg ="";
    $file_name = $_FILES["img_file"];
    if ($img_file == "") {
        $msg =  "Attach an image";
    } elseif ($_FILES["img_file"]["size"] <= 0 ) {
        $msg = "Image is not proper.";
    } else {
        $ext = strtolower(end(explode(".", $img_file)));

        if ( !in_array($ext, $validExt) )  {
            $msg = "Not a valid image file";
        } else {
            $filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;
            if (move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
             //   echo "<a href='#' title='$filePath' ><img src='$filePath' alt='$img_file' class=\"img-thumbnail imageresource\" style=\"width: 100px;height: 100px;\"></a>";
             //this will return PAth of img saved
             echo $filePath;

            }else {
                $msg .= "Subor sa nepodarilo nahrat na disk ";
            }

        }
    }
    //echo $msg;
}

?>

