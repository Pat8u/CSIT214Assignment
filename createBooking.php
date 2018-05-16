<?php 
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
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







