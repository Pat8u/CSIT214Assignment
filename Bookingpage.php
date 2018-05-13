<?php
$Eid = $_GET["Eid"];


?>

<html>
<head>
	
</head>
<title>TestPage</title>
<body>
<form id = "eventForm" action = "createBooking.php" target="_self" method="post">
Event id: <br />
<input type = "text" name = "Eid" value = <?php echo htmlspecialchars($Eid)?> readonly> <br />
Additional Info <br />
<textarea name="additionalinfo" rows = "10" cols = "50"></textarea><br />
<input type = "submit" value = "Submit" name = "submit" id = "submit" />
</form>


</body>



</html>