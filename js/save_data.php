<?php


function init_conn_to_db(){
    return (new MySQLi("localhost", "root", "hofer23", "examples"));
}

function write_inzerat_db() {
    $mysqli = init_conn_to_db();
    $result= "";
    /* Variables pull from POST method - ajax */
    $lat = $_POST['lat'];
    $lng= $_POST['lng'];
    $desc = $_POST['desc'];

    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }

    $sql = "INSERT INTO markers (name, lat, lng, type) values ('$desc','$lat','$lng','bar')";
    //$sql = "INSERT INTO `contacts`(`name`, `phone`, `email`, `city`, `state`, `date`) VALUES ('$name', '$phone', '$email', '$city', '$state', '$date')";
    //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    if ($mysqli->query($sql) === TRUE) {
        $result = true;
    } else {
        $result = false;
    }
    flush();
    $mysqli->close();

    return  $result;
}

//*************************************
//MAIN CODE for calling functions :
//*************************************

write_inzerat_db();

?>

