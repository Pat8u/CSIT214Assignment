
<?php 
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];

if(isset($_POST['submit'])){
	$uPass = md5($_POST["uPassword"]);
	$newPass = md5($_POST["newPass"]);

	$conn = new mysqli($servername, $username, $password,$dbname);
	$sql = "SELECT passWord FROM USERS WHERE Uid = '$Uid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$oldPass = $row['passWord'];
	
	if($uPass == $oldPass){
	
		$sql = "UPDATE USERS SET passWord = '$newPass' WHERE Uid = '$Uid'";
		if($conn->query($sql) == TRUE){
			echo 'Password has been updated. Click to go <a href = "changeDetails.php">back</a>';
		} else {
			echo "Error updating table: " . $conn->error;
		}
	} else {
		die('Old Password did not match');
	}	
}
$conn->close();
?>
