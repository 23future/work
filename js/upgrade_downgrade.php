<?php
require_once 'db_connection.php';
//TODO : add session to be able detect if user voted


function update_rate($id){
    echo "rate UP ";
    $mysqli = connect_to_db();
    $res = "";
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
        $query = "update t_reviews set `cost`=(`cost`+1) where `id` = ?";
        $statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('s', $id);
        //execute query
        if($statement->execute()){
            echo "Upgraded post";
        }else {
            echo "ERROR: upgraded post";
        }

    }
    flush();
    $mysqli->close();
    //return $res;
}

function downgrade_rate($id){
    echo "rate DOWN ";
    $mysqli = connect_to_db();
    $res = "";
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
        $query = "update t_reviews set `cost`=(`cost`-1) where `id` = ?";
        $statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('s', $id);
        //execute query
        if($statement->execute()){
            echo "downgraded post";
        }else {
            echo "ERROR : downgraded post";
        }

    }
    flush();
    $mysqli->close();
    //return $res;
}

if ($_POST['id_up']){
    echo "UP";
    update_rate($_POST['id_up']);
}

if ($_POST['id_down']){
    echo "DOWN";
    downgrade_rate($_POST['id_down']);
}
?>