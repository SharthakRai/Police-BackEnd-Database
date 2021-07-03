<?php
// PHP script in order to connect to the MySQL database server

$sname= "localhost";
$uname= "root";
$password = "";
$db = "dis_cw2";

// Attempt to connect to MySQL database 
$conn = mysqli_connect($sname, $uname, $password, $db);

// Check connection
if (!$conn) {
	echo "Connection failed!";
}





