<?php 
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$Eid = $_POST["Eid"];

$sql = "INSERT INTO EVENTS (title,description,edate,creationedate,location,coordinatorid)(SELECT d.title,d.description,d.edate,d.creationedate,d.location,d.coordinatorid FROM UNAPPEVENTS d WHERE d.Eid = $Eid)";

if($conn->query($sql) === TRUE){
	echo "\r\n Event approved";
	$sql = "DELETE FROM UNAPPEVENTS WHERE Eid = $Eid";
	$conn -> query($sql);
	echo '<br/> all cleaned up <a href = "ViewUnapprovedEvents.php">Go back</a>';
}
else {
	echo "Error approving event: " . $conn->error;
}
















?>