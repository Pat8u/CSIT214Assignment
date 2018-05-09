<?php
require 'sqlinfo.php';

//this files returns the event count so a for loop can be constructed in order to display all events

$conn = new mysqli($servername,$username,$password,$dbname);
$sql = "SELECT COUNT(*) FROM EVENTS";
$result = $conn -> query($sql);

$row = $result -> fetch_assoc();
echo $row["COUNT(*)"];



$conn -> close();


 ?>