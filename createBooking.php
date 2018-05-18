<?php 
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$Eid = $_POST["Eid"];
$additionalinfo = htmlspecialchars($_POST["additionalinfo"]);
if($Uid == null){
	echo 'you need to create an account or log in <a href = "/">Homepage</a>';
}
else {
$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "INSERT INTO BOOKINGS (Uid,Eid,bookingDate,additionalinfo) VALUES ($Uid,$Eid,now(),'$additionalinfo')";

if($conn->query($sql) === TRUE){
	echo 'Booking success <br> <a href = "/">Homepage</a>';
}
else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();
}
?>

	









