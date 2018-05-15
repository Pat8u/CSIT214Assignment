<?php
require "sqlinfo.php";

$conn = new mysqli($servername, $username, $password,$dbname);


		
$sql = "SELECT title,description,edate,creationedate,location FROM EVENTS";
$results = $conn -> query($sql);
$rows = array();
if($results -> num_rows > 0){
	while($r = mysqli_fetch_assoc($results)){
		$rows[] = $r;
	}
		
	$rows = json_encode($rows); //don't need this since Im just using the php document
	echo $rows;

}


	
	

$conn -> close();
?>