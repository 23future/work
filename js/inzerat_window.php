<?php
    require_once ('db_connection.php');

    if (isset($_POST['id_of_inzerat'])){
        $id = $_POST['id_of_inzerat'];
        $rows1 = null;
        $rows2 = null;
        $mysqli = connect_to_db();

        if ($mysqli->connect_error) {
            echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
            exit;
        } else {
            $mysqli->set_charset('utf8');
        }

        $query_ad = "SELECT id, data ,name , surn, address, cena, vymera, title, phone FROM t_inzerat  WHERE id = '$id'";
        //$query_ad = "SELECT * FROM t_inzerat  WHERE id = '$id'";
        $query_images = "SELECT * FROM `t_ad_img` WHERE ad_id='$id' ";
        //load all data about $id selected , if exists

                if ($result1 = $mysqli->query($query_ad))
                {
                    while($row1 = $result1->fetch_array(MYSQL_ASSOC)) {
                        $rows1[] = $row1;
                    }
                }

        //if returned count is more then 0 , then  load picture paths for $id
        if ($result2 = $mysqli->query($query_images)) {

            if (($sel_num_of_rows2 = $result2->num_rows)!=0){
                //if ($result2 = $mysqli->query($query_images))
                //{
                    while($row2 = $result2->fetch_array(MYSQL_ASSOC)) {
                        $rows2[] = $row2;
                    }
                //}

            }
        }
        //Encode data into JSON format
        $update_ad = json_encode($rows1);
        $list_images = json_encode($rows2);
        $output = "{ \"ad\":" . $update_ad . ",\"images\":" . $list_images . "}";
        //$output = "testok ";
        flush();
        $mysqli->close();
        echo $output;
    }

?>
