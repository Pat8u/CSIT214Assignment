<?php
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$Eid = $_GET["Eid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "DELETE FROM BOOKINGS WHERE Eid = $Eid";
if($conn->query($sql) === TRUE){
	echo 'Bookings for the event successfully deleted';
}
else {
	echo "Error deleteing: " . $conn->error;
}
$sql = "DELETE FROM EVENTS WHERE Eid = $Eid";

if($conn->query($sql) === TRUE){
	echo 'Event successfully deleted <a href = "/ViewOwnEvents.php"> Go back </a> ';
}
else {
	echo "Error deleteing: " . $conn->error;
}




$conn -> close;
?>