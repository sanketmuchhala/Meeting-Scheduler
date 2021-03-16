<?php

$servername = "localhost";
$dBUsername = "Prince";
$dbPassword = "p2963";
$dBName = "db_ms";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>