<?php
    require_once ('db_connection.php');
    header('Content-Type: application/json');

function pull_inzerat_info($id_num) {
    $mysqli = init_conn_to_db();
    $row= [];

    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
    echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
     exit;
    } else {
    $mysqli->set_charset('utf8');
    }

        $sql = "SELECT id, data  FROM t_inzerat  WHERE id = '17' ";
        //$sql = "INSERT INTO `contacts`(`name`, `phone`, `email`, `city`, `state`, `date`) VALUES ('$name', '$phone', '$email', '$city', '$state', '$date')";
        //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

    if ($result = $mysqli->query($sql)) {

        /* fetch object array */
        $row = $result->fetch_row();

        /* free result set */
        $result->close();
    }

        $mysqli->close();
        return $row;
    }

//MAIN
$inzerat = [];
$inzerat = pull_inzerat_info($_POST['id_of_inzerat']);
if ($inzerat){
    echo json_encode(array('id' => $inzerat[0],'data' => $inzerat[1]));
}

    //echo "Shit". $inzerat[0] . $inzerat[1] ;
?>
