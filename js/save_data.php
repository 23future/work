<?php

require_once ('db_connection.php');

function write_inzerat_db() {
    $mysqli = init_conn_to_db();
    $result= "";
    /* Variables pull from POST method - ajax */
    $pos_lat =  $_POST['lat'];
    $pos_lng = $_POST['lng'];
    $desc = $_POST['desc'];
    $cena =  $_POST['cena'];
    $vymera = $_POST['vymera'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $category =$_POST['category'];
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }

    $sql = "INSERT INTO t_inzerat (data, lat, lng, type, name, surn,email,phone,address,title,cena,vymera) values ('$desc','$pos_lat','$pos_lng','$category','$name','$surname','$email','$phone','$address','$subject','$cena','$vymera')";
    if ($mysqli->query($sql) === TRUE) {
        $result = true;
        echo "Inzerat bol uspesne pridany, Dakujeme!";
    } else {
        $result = false;
        echo "Inzerat sa nepodarilo pridat , prosim ,zopakujte akciu";
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

