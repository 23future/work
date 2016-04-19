<?php
require_once 'db_connection.php';
//TODO : add session to be able detect if user voted

function get_positive_rate($id){
    $pos_rate = "";
    $pos_neg = "";
    $pom = array();
    $mysqli = connect_to_db();
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
        $query = "SELECT pos_rate, neg_rate FROM t_reviews where id = ?";
        $statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('s', $id);
        //execute query
        $statement->execute();
        /* bind result variables */
        $statement->bind_result($pos_rate, $pos_neg);
        $pom = array($pos_rate,$pos_neg);
    }
    flush();
    $mysqli->close();
    return $pom;
}

function get_detail($id){
    $pos_rate = "";
    $neg_rate = "";
    $mail = "";
    $data = "";
    $lat = "";
    $lng = "";

    $pom = array();
    $mysqli = connect_to_db();
    /* Connect to database and set charset to UTF-8 */
    if ($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
        $query = "SELECT email, data, lat, lng, pos_rate, neg_rate FROM t_reviews where id = ?";
        //$query = "SELECT data FROM t_reviews where id = ?";
        if($statement = $mysqli->prepare($query)){
            //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
            $statement->bind_param('s', $id);
            //execute query
            $statement->execute();
           /* bind result variables */
           $statement->bind_result($mail, $data, $lat, $lng, $pos_rate, $neg_rate);
           while ($row = $statement->fetch()) {
               //$pom[] = $row;
            }
           //echo "EXECUTED CORRECTLY:" . $id . $mail . $data . $lat . $lng .  $pos_rate . $neg_rate ;
           $pom = array($mail, $data, $lat, $lng, $pos_rate, $neg_rate);
           // echo json_encode($pom);
            return $pom;

        }
    }
    flush();
    $mysqli->close();
    return $pom;
}

//$rate[] = get_positive_rate($_POST['id']);

$details = get_detail($_POST['id']);

$return = "            <div class=\"modal-header\">

                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>

            </div><div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\">
                    </div>
                </div>

            </div>
            <div class=\"container\">
                <div class=\"well well-sm\">
                    <div class=\"row\">

                        <div class=\"col-xs-12\">
                            <h2>Titul prispevku ***</h2>
                            <small><cite title=\"Ulica Nejaka, Bratislava\"> $details[0] <i class=\"glyphicon glyphicon-map-marker\">
                            </i></cite></small>
                            <p>
                                <br />
                                <br />
                            <div class=\"col-md-4\">
                                <img src=\"images/1.png\" width=\"100\" class=\"img-circle\" />
                                <img src=\"images/3.png\" width=\"100\" class=\"img-circle\" />
                            </div>
                                <div class=\"col-xs-12 col-md-8\">
                                    <p>$details[1]</p>
                                    <br>


                                    <button  type=\"button\" class=\"btn btn-primary  outline agree\"><i class=\"glyphicon glyphicon-thumbs-up\"></i>Suhlasim s tym</button>
                                    <button  type=\"button\" class=\"btn btn-primary  outline disagree\"><i class=\"glyphicon glyphicon-thumbs-down\"></i>Nesuhlasim</button>


                                </div>

                        </div>
                    </div>
                </div>

            </div>";

$return = "    <div class=\"modal-content\">
				<div class=\"modal-header\">
                    <div class=\"close-modal\" data-dismiss=\"modal\">
                        <div class=\"lr\">
                            <div class=\"rl\">
                            </div>
                        </div>
                    </div>
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">×</span><span class=\"sr-only\">Close</span></button>
					<h3 class=\"modal-title\" id=\"lineModalLabel\">Detail Prispevku</h3>
				</div>
				<div class=\"modal-body\">
					<!-- Map section for selection of GPS point -->
					<div class=\"col-sx-8 col-md-10 col-md-offset-1\">
                            <h2>Titul prispevku ***</h2>
                            <small><cite title=\"Ulica Nejaka, Bratislava\">$details[0] <i class=\"glyphicon glyphicon - map - marker\">
                            </i></cite></small>
					</div>

                <div class=\"row\">

                        <div class=\"col-xs-12\">

                            <p>
                                <br />
                                <br />
                            <div class=\"col-md-4\">
                                <img src=\"images/1.png\" width=\"180\" class=\"img-circle\" />
                            </div>
                                <div class=\"col-xs-12 col-md-8\">
                                    <p>$details[1]</p>
                            </div>
                        </div>
                    </div>

				</div>
				<div class=\"modal-footer\">
                                    <button id=\"btn-01\" type=\"button\" class=\"btn btn-primary  outline agree\"><i class=\"glyphicon glyphicon-thumbs-up\"></i>Suhlasim s tym</button>
                                    <button id=\"btn-02\" type=\"button\" class=\"btn btn-primary  outline disagree\"><i class=\"glyphicon glyphicon-thumbs-down\"></i>Neshuhlasim</button>

                 <button type=\"button\" class=\"btn btn-default pull-right\" data-dismiss=\"modal\"  role=\"button\">Close</button>
				</div>
			</div>";

echo $return;

?>



