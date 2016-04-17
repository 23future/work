<?php
/*
author: beepin.eu
CREATE TABLE IF NOT EXISTS t_post_img (
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        post_id  VARCHAR(6) DEFAULT NULL,
        image_url VARCHAR(100) NOT NULL,
        ctime TIMESTAMP DEFAULT NOW()
       );
*/
include_once 'js/db_connection.php';
// TODO: put here session to load session and then save file into it !
$mysqli = connect_to_db();
if(isset($_FILES['img_file'])){

    $img_file = $_FILES["img_file"]["name"];
    $folderName = "uploads/";
    //$folderName = "/tmp/";
    $validExt = array("jpg", "png", "jpeg", "bmp", "gif");
    $msg ="";
    $id = "2";
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
            //$msg .= $filePath ." and ". $_FILES["img_file"]["tmp_name"] . $filePath . $_SERVER['DOCUMENT_ROOT'];
            //move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath);
            if (move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
                //echo "<img src='$filePath' style='width: 50px; height: 50px;'/>";
                echo "<a href='#' title='$filePath' ><img src='$filePath' alt='$img_file' class=\"img-thumbnail imageresource\" style=\"width: 100px;height: 100px;\"></a>";
                //After write into Storage , file is pushed into temp array
                //array_push($_SESSION['uploaded_files'],$filePath);
               // echo "<p>'$id'.' / '.$filePath.'</p>";
                $prep_stmt = "INSERT INTO `t_post_img` (`post_id`, `image_url`) VALUES (?,?)";
                $stmt = $mysqli->prepare($prep_stmt);
                if ($stmt) {
                    $stmt->bind_param('ss', $id, $filePath);
                    $stmt->execute();
                    $stmt->store_result();
                    $msg .= 'Database inserted';

                } else {
                    $msg .= '<p class="error">Database error</p>';
                }
            }else {
                $msg .= "Subor sa nepodarilo nahrat ";
            }


        }
    }
    //echo $msg;
}

?>

