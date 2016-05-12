<?php
require_once 'db_connection.php';


function get_posts_from_db($email,$data,$gender,$nickname,$lat,$lng){
    $mysqli = connect_to_db();
    $msg = "";
    $id ="";
    //echo "output: ". $email . $data . $gender;
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        $msg .= 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');

        $query = "INSERT INTO t_reviews (email,data,gender,nickname, lat,lng) VALUES (?,?,?,?,?,?)";
        $statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('ssssss', $email, $data, $gender,$nickname,$lat,$lng);

        //execute query
        if($statement->execute()){
            $id = $statement->insert_id;
            $msg .= "successfully inserted into DB";
        }

    }

    flush();
    $mysqli->close();
    return  $id;
}

function load_image_to_db($path, $id){
    $mysqli = connect_to_db();
    $msg = "";
    if (file_exists($path)) {
        $prep_stmt = "INSERT INTO `t_post_img` (`post_id`, `image_url`) VALUES (?,?)";
        $stmt = $mysqli->prepare($prep_stmt);
        if ($stmt) {
            $stmt->bind_param('ss', $id, $path);
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

if (isset($_POST['email']) && isset($_POST['content']) && isset($_POST['gender']) && isset($_POST['nickname']) && isset($_POST['lat']) && isset($_POST['lng'])){
  $id =  get_posts_from_db($_POST['email'],$_POST['content'],$_POST['gender'],$_POST['nickname'],$_POST['lat'],$_POST['lng']);
}

if (isset($_POST['img'])){
    load_image_to_db($_POST['img'],$id);
}

?>