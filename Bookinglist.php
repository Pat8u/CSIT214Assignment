<?php
require "sqlinfo.php";
$Uid = 1; //placeholder
$isAdmin = false;
$conn = new mysqli($servername, $username, $password,$dbname);

if($Uid == null){
	echo "need to make an account"; //need to add a link to the account creation place
}
else{
	$sql = mysqli_query($conn,"SELECT a.Uid FROM USERS A JOIN ADMIN B ON a.Uid = b.Uid WHERE a.Uid = '$Uid'");
	
	if($sql->num_rows == 0){
	//non admin view
		$sql = "SELECT a.title,a.location,a.edate,b.Bid,b.bookingDate,b.additionalInfo FROM EVENTS a JOIN BOOKINGS b ON a.Eid = b.Eid
		WHERE b.Uid = '$Uid'";
		$results = $conn -> query($sql);
		$rows = array();
		if($results -> num_rows > 0){
			while($r = mysqli_fetch_assoc($results)){
				$rows[] = $r;
			}
		
		$rows = json_encode($rows); //don't need this since Im just using the php document
		echo $rows;

		}


	}
	
	else {
		//admin view
	}
}

$conn -> close();
?>
