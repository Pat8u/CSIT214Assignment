<?php 
require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"];
$Bid = $_GET["Bid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT Eid,additionalinfo FROM BOOKINGS
WHERE Bid = $Bid";
$results = mysqli_query($conn,$sql);
$row = $results -> fetch_assoc();





?>

<html>
<head>
	
</head>
<title>TestPage</title>
<body>
<form id = "eventForm" action = "" target="_self" method="post">
Booking id: <br />
<input type = "text" name = "Eid" value = <?php echo htmlspecialchars($Bid)?> readonly> <br />
Event id: <br />
<input type = "text" name = "Eid" value = <?php echo htmlspecialchars($row["Eid"])?> readonly> <br />
Additional Info <br />
<textarea name="additionalinfo" rows = "10" cols = "50"><?php echo htmlspecialchars($row["additionalinfo"])?></textarea><br />
<input type = "submit" value = "Submit" name = "submit" id = "submit" />
</form>


</body>



</html>

<?php 
if(isset($_POST['submit'])){

$Eid = $row["Eid"];
$additionalinfo = $_POST["additionalinfo"];

$sql = "UPDATE BOOKINGS SET additionalinfo = '$additionalinfo' WHERE Bid = $Bid";
if($conn->query($sql) == TRUE){
	
	echo 'Booking Updated';
	echo '<a href = "/Bookinglist.html"> Go back to Booking page(ignore the old values above) </a>';
}
else {
	echo "Error updating event: " . $conn->error;
}
}
$conn -> close; 







?>