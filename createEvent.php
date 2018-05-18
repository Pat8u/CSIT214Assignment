

<?php 

require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];
$dateget = new DateTime();
$coordinatorid = $Uid; //placeholder for now, waiting for the user table to be created
$title = htmlspecialchars($_POST["title"]);
$description = htmlspecialchars($_POST["Edescript"]);
$edate = htmlspecialchars($_POST["edate"] ." ".$_POST["edate-time"].":00");
$location = htmlspecialchars($_POST["Eloc"]);
if($Uid == null){
	echo 'You need an account';
	echo '<a href = "/"> Go back to Homepage </a>';
}else{

$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "SELECT a.Uid FROM USERS a JOIN ADMIN b ON a.Uid = b.Uid WHERE a.Uid = $Uid";
$result = mysqli_query($conn,$sql);

if($result->num_rows == 0){

$sql = "INSERT INTO UNAPPEVENTS (title,description,edate,creationedate,location,coordinatorid) VALUES ('$title','$description','$edate',now(),
'$location','$coordinatorid')";


if($conn->query($sql) == TRUE){
	
	echo 'Event application successfully sent to the admins';
	echo '<a href = "/"> Go back to Homepage </a>';
}
else {
	echo "Error creating event: " . $conn->error;
}






}

else{
$sql = "INSERT INTO EVENTS (title,description,edate,creationedate,location,coordinatorid) VALUES ('$title','$description','$edate',now(),
'$location','$coordinatorid')";


if($conn->query($sql) == true){

	echo 'Event created <br> <a href = "/">Homepage</a>';
}
else {
	echo "Error creating table: " . $conn->error;
}
}
}
$conn->close();





?>

