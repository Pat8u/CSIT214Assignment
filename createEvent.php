<?php 

require 'sqlinfo.php';
$dateget = new DateTime();
$coordinatorid = 1; //placeholder for now, waiting for the user table to be created
$title = htmlspecialchars($_POST["title"]);
$description = htmlspecialchars($_POST["Edescript"]);
$edate = htmlspecialchars($_POST["edate"] ." ".$_POST["edate-time"].":00");
$location = htmlspecialchars($_POST["Eloc"]);


$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "INSERT INTO EVENTS (title,description,edate,creationedate,location,coordinatorid) VALUES ('$title','$description','$edate',now(),
'$location','$coordinatorid')";


if($conn->query($sql) === TRUE){
	
}
else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();





?>
<html>
	<head>
	</head>
	<title>
		Event Created
	</title>
<body>
	Event created <br> <a href = "/">Homepage</a>

</body>


</html>