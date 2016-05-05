<?php
require_once 'db_connection.php';


$earth_radius = 3960.00; # in miles
$lat_1 = "47.117828";
$lon_1 = "-88.545625";
$lat_2 = "47.122223";
$lon_2 = "-88.568781";

function distance_haversine($lat1, $lon1, $lat2, $lon2) {
    $delta_lat = $lat2 - $lat1 ;
    $delta_lon = $lon2 - $lon1 ;

    global $earth_radius;
    $alpha    = $delta_lat/2;
    $beta     = $delta_lon/2;
    $a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
    $c        = asin(min(1, sqrt($a)));
    $distance = 2*$earth_radius * $c;
    $distance = round($distance, 4);
    //echo $lat1. " ". $lon1. " ".$lat2. " ".$lon2. "=".$distance . "<br>";
    return $distance;
}


function get_posts_from_db($id){
    $mysqli = connect_to_db();
    $return ="<div class=\"panel panel-default\">
					<div class=\"panel-heading\">
						<span class=\"glyphicon glyphicon-list-alt\"></span><b>Recenzie okolia nehnutelnosti</b></div>
					<div class=\"panel-body\">
						<div class=\"row\">
							<div class=\"col-xs-12\" >
								<ul class=\"demo1\" id=\"demo1_div\">";
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
    //$lists =  json_encode($a_json);
    foreach ($a_json as $list) {

        if ((distance_haversine($list['lat'], $list['lng'], $_POST['lat'], $_POST['lng'])) < 0.5) {   // this is setting for distance selection
            //$str = substr($list['data'], 0, 45);
            $str = substr($list['title'], 0, 30);
            if ($list['gender'] == "M") {
                $return .= "<li class=\"news-item\">
										<table cellpadding=\"4\">
											<tr>
												<td><img src=\"images/man.png\" width=\"60\" class=\"img-circle\" /></td><td>" . $list['id'] . "&nbsp</td>
												<td><strong style=\"text-transform: uppercase;\"> ".$list['nickname']."</strong>&nbsp" . $str . "<a data-toggle=\"modal\" data-target=\"#post_detail\" class='id_post' name=" . $list['id'] . "> viac...</a></td>
											</tr>
										</table>
									</li>";
            }else {
                $return .= "<li class=\"news-item\">
										<table cellpadding=\"4\">
											<tr>
												<td><img src=\"images/woman.png\" width=\"60\" class=\"img-circle\" /></td><td>" . $list['id'] . "&nbsp</td>
												<td><strong style=\"text-transform: uppercase;\"> ".$list['nickname']."</strong>&nbsp" . $str . "<a data-toggle=\"modal\" data-target=\"#post_detail\" class='id_post' name=" . $list['id'] . "> viac...</a></td>
											</tr>
										</table>
									</li>";
            }
            }
        }

        $return .= "</ul>
							</div>
						</div>
					</div>
					<div class=\"panel-footer\">

					</div>
				</div>";

        echo $return;
}


$id = strip_tags($_POST['id']);
get_posts_from_db($id);

?>


