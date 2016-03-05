<?php

function init_conn_to_db(){
    return (new MySQLi("localhost", "root", "hofer23", "examples"));
}

function load_data_from_database()
{
    $mysqli = init_conn_to_db();

    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }
    /* retrieve the search term that autocomplete sends */
//$term = trim(strip_tags($_GET['term']));
    $a_json = array();
    $a_json_row = array();
    if ($data = $mysqli->query("SELECT * FROM street")) {
        while ($row = mysqli_fetch_array($data)) {
            array_push($a_json, $row['street_name']);
        }
    }
// jQuery wants JSON data
    echo json_encode($a_json);
    flush();

    $mysqli->close();
}

function get_posts_from_db() {

    $mysqli = init_conn_to_db();

    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }
    /* retrieve the search term that autocomplete sends */
//$term = trim(strip_tags($_GET['term']));
    $a_json = array();
    if ($data = $mysqli->query("SELECT data FROM t_reviews")) {
        while ($row = mysqli_fetch_array($data)) {
            array_push($a_json, $row['data']);
        }
    }
// jQuery wants JSON data
    //echo json_encode($a_json);
    flush();
    $mysqli->close();

    return  $a_json;
}


?>


