<?php 

require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$Bid = $_GET["Bid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "DELETE FROM BOOKINGS WHERE Bid = $Bid";

if($conn->query($sql) === TRUE){
	echo 'Booking successfully deleted <a href = "/Bookinglist.html"> Go back </a> ';
}
else {
	echo "Error creating table: " . $conn->error;
}



?>