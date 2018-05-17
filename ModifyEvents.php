<?php 
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$Eid = $_GET["Eid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT Eid,title,location,edate,description FROM EVENTS
WHERE Eid = $Eid";
$results = mysqli_query($conn,$sql);
$row = $results -> fetch_assoc();
$date = new DateTime($optValue);




?>

<html>
<head>
	
</head>
<title>TestPage</title>
<body>
<form id = "eventForm" action = "" target="_self" method="post">
Event id: <br />
<input type = "text" name = "Eid" value = <?php echo htmlspecialchars($Eid)?> readonly> <br />
Title of event:
<input type = "text" name = "title" value = "<?php echo htmlspecialchars($row["title"])?>"><br>
Event Description:<br>
<textarea name="Edescript" rows = "10" cols = "50"  ><?php echo htmlspecialchars($row["description"])?></textarea><br>
Date and time of the event:<br>
<input type = "date" name = "edate" value = <?php echo htmlspecialchars(date_format($date,'Y-m-d'))  ?>>
<input type = "time" name = "edate-time" value = <?php echo htmlspecialchars(date_format($date,'h:i a'))  ?>><br>
Event Location:<br>
<textarea name="Eloc" rows = "10" cols = "50"  ><?php echo htmlspecialchars($row["location"])  ?></textarea><br>
<input type = "submit" value = "Submit" name = "submit" id = "submit" />
</form>


</body>



</html>

<?php 
if(isset($_POST['submit'])){

$coordinatorid = $Uid; //placeholder for now, waiting for the user table to be created
$title = htmlspecialchars($_POST["title"]);
$description = htmlspecialchars($_POST["Edescript"]);
$edate = htmlspecialchars($_POST["edate"] ." ".$_POST["edate-time"].":00");
$location = htmlspecialchars($_POST["Eloc"]);

$sql = "UPDATE EVENTS SET title = '$title' , description = '$description', edate = '$edate', location = '$location' WHERE Eid = $Eid ";
if($conn->query($sql) == TRUE){
	
	echo 'Event Updated';
	echo '<a href = "/ViewOwnEvents.php"> Go back to Event page(ignore the old values above) </a>';
}
else {
	echo "Error updating event: " . $conn->error;
}
}
$conn -> close; 







?>