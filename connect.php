<?php
$db="Reda_db";
$host="localhost";
$user="roottest";
$pass="root";
$conn=mysqli_connect($host,$user,$pass,$db);
$ch="SET CHARACTER SET utf8";
mysqli_query($conn,$ch);
if(!$conn){
	echo "Not connect ";
}
