<?php 
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];

if(isset($_POST['submit'])){
$fName = htmlspecialchars($_POST["fName"]);
$lName = htmlspecialchars($_POST["lName"]);
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "UPDATE USERS SET firstName = '$fName', lastName = '$lName' WHERE Uid = '$Uid'";
if($conn->query($sql) == TRUE){
  echo "Name has been updated.";
  header("Location:changeDetails.php");
} else {
			echo "Error updating table: " . $conn->error;
		}	
	}
}
$conn->close();
?>
