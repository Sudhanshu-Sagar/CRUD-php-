<?php
$servername= "localhost";
$username="root";
$password="";
$db="registration";

$conn=mysqli_connect($servername,$username,$password,$db);

if(!$conn)
echo "Could not connect to Database Server";

?>