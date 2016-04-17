<?php

require_once "db_connection.php";

$dom = new DOMDocument("1.0",'UTF-8');
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server
$connection=mysql_connect (HOST, USER, PASSWORD);
if (!$connection) {  die('Not connected : ' . mysql_error());}
mysql_set_charset("UTF8", $connection);
// Set the active MySQL database

$db_selected = mysql_select_db(DATABASE, $connection);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT id,cena,lat,lng,type FROM t_inzeratTest WHERE 1";
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");
$dom->encoding = "UTF-8";
// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
    // ADD TO XML DOCUMENT NODE
    //echo "marker" . $row['address'] ;
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id",$row['id']);
    $newnode->setAttribute("price", $row['cena']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    $newnode->setAttribute("type", $row['type']);
    //$newnode->setAttribute("id", $row['id']);
}
xml_parser_set_option($dom,XML_OPTION_TARGET_ENCODING, "utf-8");
$dom->encoding = "UTF-8";
echo $dom->saveXML();

?>
