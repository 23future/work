<?php
require_once 'db_connect.php';

function get_posts_from_db(){
    $mysqli = connect_to_db();

    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');    }
    /* retrieve the search term that autocomplete sends *///
    $term = trim(strip_tags($_GET['term']));
    $a_json = array();

    if ($data = $mysqli->query("SELECT * FROM t_reviews")){
        while ($row = mysqli_fetch_assoc($data))
        {
            //array_push($a_json, $row['data']);
            $a_json[] = $row;
        }
    }// jQuery wants JSON data

    flush();
    $mysqli->close();
    return  json_encode($a_json);
}
?>