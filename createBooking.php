<?php 
require "sqlinfo.php";
//PLACEHOLDER
$Uid = 1; //this is simply a placeholder what will actually happen here is I will get the user id from the session.
$Eid = $_POST["Eid"];
$additionalinfo = htmlspecialchars($_POST["additionalinfo"]);
if($Uid == null){
	echo "you need to create an account or log in";
}

$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "INSERT INTO BOOKINGS (Uid,Eid,bookingDate,additionalinfo) VALUES ('$Uid','$Eid',now(),'$additionalinfo')";

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
		Booking successful
	</title>
<body>
	Booking success <br> <a href = "/">Homepage</a>

</body>


</html>







