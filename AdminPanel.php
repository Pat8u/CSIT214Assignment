<?php

require "sqlinfo.php";
session_start();
$Uid = $_SESSION["Uid"]; 
$conn = new mysqli($servername, $username, $password,$dbname);

$sql = mysqli_query($conn,"SELECT a.Uid FROM USERS a JOIN ADMIN b ON a.Uid = b.Uid WHERE a.Uid = $Uid");

if($sql->num_rows == 0){
	echo 'Leave this place <a href = "/">Flee</a>';

}
else{
	echo 'This is a bunch of admin functions that you can perform <br/> <a href = "ViewUnapprovedEvents.php">View and Approve Unapproved Events</a><br/><a href = "HistoryPage.html"> View statistics related to events </a> '







}




?>