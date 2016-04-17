<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12.3.2016
 * Time: 12:28
 */

define("HOST", "89.22.98.155"); 			// The host you want to connect to.
define("USER", "root"); 			// The database username.
define("PASSWORD", "reality2309"); 	// The database password.
define("DATABASE", "reality");             // The database name.


function init_conn_to_db(){
    return (new MySQLi(HOST, USER, PASSWORD, DATABASE));
}


function init_db() {

    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

    $connection=mysql_connect (HOST, USER, PASSWORD);
    if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

    $db_selected = mysql_select_db(DATABASE, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

}
?>