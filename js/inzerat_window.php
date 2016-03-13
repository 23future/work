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

        $sql = "SELECT id, data ,name , surn, address, cena, vymera, title, phone FROM t_inzerat  WHERE id = '$id_num'";
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
    echo json_encode(array('id' => $inzerat[0],'data' => $inzerat[1], 'name' => $inzerat[2],'surn' => $inzerat[3], 'address' => $inzerat[4], 'cena' => $inzerat[5], 'vymera' => $inzerat[6],
        'title' => $inzerat[7], 'phone' => $inzerat[8]));
}

    //echo "Shit". $inzerat[0] . $inzerat[1] ;
?>
