<?php
require_once 'db_connection.php';
//TODO : add session to be able detect if user voted

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $rows1 = array();
    $rows2 = array();
    $mysqli = connect_to_db();
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
        $query = "SELECT email, data, lat, lng, cost FROM t_reviews where id = $id";
        $query_images = "SELECT image_url FROM `t_post_img` WHERE post_id='$id' ";

        if ($result1 = $mysqli->query($query))
        {
            while($row1 = $result1->fetch_array(MYSQL_ASSOC)) {
                $rows1[] = $row1;
            }
        }

        //if returned count is more then 0 , then  load picture paths for $id
        if ($result2 = $mysqli->query($query_images)) {

            if (($sel_num_of_rows2 = $result2->num_rows)!=0){
                while($row2 = $result2->fetch_array(MYSQL_ASSOC)) {
                    $rows2[] = $row2;
                }
            }
        }
    }
    //Encode data into JSON format
    $update_ad = json_encode($rows1);
    $list_images = json_encode($rows2);
    $pom = "{ \"post\":" . $update_ad . ",\"images\":" . $list_images . "}";

    flush();
    $mysqli->close();
    echo $pom;
}

?>



