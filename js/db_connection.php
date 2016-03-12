<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12.3.2016
 * Time: 12:28
 */


function init_conn_to_db(){
    return (new MySQLi("localhost", "root", "hofer23", "examples"));
}


function init_db() {


//require("js/db.php");
    $servername = "localhost";
    $username = "root";
    $password = "hofer23";
    $dbname = "examples";
    $database="examples";
// Start XML file, create parent node

    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

    $connection=mysql_connect ('localhost', $username, $password);
    if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

}
?>