<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="cruise_management_db";
// $mysqli=new mysqli($host,$dbuser, $dbpass, $db);
$conn = mysqli_connect("$host","$dbuser","$dbpass",$db);
?>
