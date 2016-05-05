<?php
require_once 'db_connection.php';

function get_posts_from_db($email,$data,$gender,$nickname,$lat,$lng){
    $mysqli = connect_to_db();
    $msg = "";
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
            $msg .= "successfully inserted into DB";
        }

    }

    flush();
    $mysqli->close();
    echo $msg;
}
get_posts_from_db($_POST['email'],$_POST['content'],$_POST['gender'],$_POST['nickname'],$_POST['lat'],$_POST['lng']);

?>