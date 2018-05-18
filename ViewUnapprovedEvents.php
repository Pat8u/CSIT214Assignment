<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script>
		function ApproveEvent(n){
			var hidForm, eventId;
      		hidForm = document.createElement('form');
      		hidForm.action = 'ApproveEvent.php';
      		hidForm.method = 'post';
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
<a href ="/AdminPanel.php">Back to admin panel </a> <br />
A list of unapproved events can be seen here






</body>



</html>


<?php
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = mysqli_query($conn,"SELECT A.Uid FROM USERS A JOIN ADMIN B ON A.Uid = B.Uid WHERE A.Uid = $Uid");
	

if($Uid == null){
	echo 'need to make an account  <a href = "createUser.php">Create Account</a>'; 
}

else if($sql->num_rows == 0){

	echo 'How did you get here, go back to the homepage <a href ="/">Flee</a>';


}

else{
	
	$sql = "SELECT Eid,title,location,edate FROM UNAPPEVENTS";

	$results = mysqli_query($conn,$sql);
	$rows = array();
	
	if($results->num_rows > 0){
		
		while($row = $results -> fetch_assoc()){
			echo '<br/> Id: ' . $row["Eid"] . '  Title: ' . $row["title"] . 'Location: ' . $row["location"] . '  Date: ' . $row["edate"] . '<br/><button id="currButton" type="button" onclick = "ApproveEvent('.$row["Eid"].')">Approve Event</button><br/><br/>';
		}
		
	
	}

}

$conn -> close();


?>


