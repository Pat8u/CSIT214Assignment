<?php
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"]; 
$isAdmin = false;
$conn = new mysqli($servername, $username, $password,$dbname);



	$sql = mysqli_query($conn,"SELECT a.Uid FROM USERS a JOIN ADMIN b ON a.Uid = b.Uid WHERE a.Uid = $Uid");
	
	if($sql->num_rows == 0){
	//non admin view
		$sql = "SELECT a.title,a.location,a.edate,b.Bid,b.bookingDate,b.additionalInfo FROM EVENTS a JOIN BOOKINGS b ON a.Eid = b.Eid
		WHERE b.Uid = $Uid";
		$results = $conn -> query($sql);
		$rows = array();
		if($results -> num_rows > 0){
			while($r = mysqli_fetch_assoc($results)){
				$rows[] = $r;
			}
		
		$rows = json_encode($rows); 
		echo $rows;

		}



	}
	
	else {
		$sql = "SELECT a.title,a.location,a.edate,b.Bid,b.bookingDate,b.additionalInfo FROM EVENTS a JOIN BOOKINGS b ON a.Eid = b.Eid";
		$results = $conn -> query($sql);
		$rows = array();
		if($results -> num_rows > 0){
			while($r = mysqli_fetch_assoc($results)){
				$rows[] = $r;
			}
		
		$rows = json_encode($rows); 
		echo $rows;

		}
	}


$conn -> close();
?>
