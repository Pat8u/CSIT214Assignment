<?php 

require "sqlinfo.php";

session_start();

$Eid = $_GET["Eid"];

$conn = new mysqli($servername, $username, $password,$dbname);
	
	$sql = "SELECT b.Bid ,b.bookingDate,b.additionalInfo FROM EVENTS a JOIN BOOKINGS b ON a.Eid = b.Eid WHERE a.Eid = $Eid";

	$results = $conn -> query($sql);
	$row = array();

	
	if($results->num_rows > 0){
		
		while($row = $results -> fetch_assoc()){
			echo '<br /> Id: ' . $row["Bid"] . '<br /> Booking Date ' . $row["bookingDate"] . '<br /> additionalInfo ' . $row["additionalInfo"] . '<br />';
		}
		
		echo '<br/><a href = "/ViewOwnEvents.php">Go back</a>';
		
	}
	else{
		echo 'no bookings for event <a href = "/ViewOwnEvents.php">Go back</a>';
	}

	



?>
<html>
</html>