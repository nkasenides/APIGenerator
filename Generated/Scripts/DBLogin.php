<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     Nicos
//  FILE:         DBLogin.php
//  DATETIME:     2018-01-22 05:51:21pm
//  DESCRIPTION:  This file is used to log in to the database.

/**********************************************************************************/
            


//Logs in to the database and returns a connection object.
function dbLogin() {
    $conn = new mysqli("localhost", "root", "usbw", "Nicos");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    return $conn;
}

	

?>