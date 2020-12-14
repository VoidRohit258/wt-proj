<?php

$servername = "remotemysql.com";
$username = "8lryFLkefl";
$password = "LnfctzhjaZ";
$db = "8lryFLkefl";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
