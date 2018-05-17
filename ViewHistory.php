



<?php
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT a.Uid FROM USERS a JOIN ADMIN b ON a.Uid = b.Uid WHERE a.Uid = '$Uid'";
$result = mysqli_query($conn,$sql);

if($result ->num_rows == 0){
	echo 'Need to be an admin in order to use this page <a href = "/">Click to return to Homepage</a>';
}
else{
	$Rowname = $_POST["Attributes"];
	$Value = $_POST["field"];
	if($Rowname == 'edate'){
		$sql = "SELECT edate FROM EVENTS  WHERE DATE(edate) = '$Value' ";
		$result = mysqli_query($conn,$sql);
		echo 'There are ' . $result -> num_rows . ' events that are/were on that day <br /> <a href = "/HistoryPage.html">Go back</a>';
	}else if($Rowname = 'location'){
		
		$optValue = $_POST["optfield"];
		$date = new DateTime($optValue);
		$dateend = $date;
		//echo date_format($date,"y-m-d");
		date_add($dateend,date_interval_create_from_date_string("7 days"));
		//echo date_format($dateend,'y-m-d');
		
		if($optValue == ""){
			$sql = "SELECT location FROM EVENTS  WHERE location = '$Value' ";
			$result = mysqli_query($conn,$sql);
			echo 'There are ' . $result -> num_rows . ' events that are taking place/had taken place at that location <br /> <a href = "/HistoryPage.html">Go back</a>';
		}else{
			$sdate = date_format($date,'y-m-d');
			$sdateend = date_format($dateend,'y-m-d');
			$sql = "SELECT location FROM EVENTS  WHERE location = '$Value' AND edate BETWEEN '$sdate' AND '$sdateend' ";

			$result = mysqli_query($conn,$sql);
			echo 'There are ' . $result -> num_rows . ' events that are taking place/had taken place at that location on that week<br /> <a href = "/HistoryPage.html">Go back</a>';
		}
	}
	$result = mysqli_query($conn,$sql);

	
}



$conn -> close();










?>