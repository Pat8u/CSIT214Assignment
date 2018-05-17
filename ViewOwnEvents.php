
<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script>
		function modifyEvent(n){
			var hidForm, eventId;
      		hidForm = document.createElement('form');
      		hidForm.action = 'ModifyEvents.php';
      		hidForm.method = 'get';
      		eventId = document.createElement('input');
      		eventId.type = 'hidden';
      		eventId.name = 'Eid';
      		eventId.value = n;
      		hidForm.appendChild(eventId);
      		document.getElementById('hidden_form_container').appendChild(hidForm);
      		hidForm.submit();
		}



	</script>
</head>
<title>Own Events</title>
<div id="hidden_form_container" style="display:none;"></div>
<body>
A list of your own events can be seen here






</body>



</html>


<?php
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];


if($Uid == null){
	echo 'need to make an account  <a href = "createUser.php">Create Account</a>'; 
}
else{
	$conn = new mysqli($servername, $username, $password,$dbname);
	$sql = "SELECT Eid,title,location,edate FROM EVENTS
	WHERE coordinatorid = $Uid";

	$results = mysqli_query($conn,$sql);
	$rows = array();
	
	if($results->num_rows > 0){
		
		while($row = $results -> fetch_assoc()){
			echo '<br/> Id: ' . $row["Eid"] . '  Title: ' . $row["title"] . 'Location: ' . $row["location"] . '  Date: ' . $row["edate"] . '<br/><button id="currButton" type="button" onclick = "modifyEvent('.$row["Eid"].')">modify event</button><br/><br/>';
		}
		
	
	}

}

$conn -> close();


?>

