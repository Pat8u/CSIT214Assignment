
<?php 
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];

if(isset($_POST['submit'])){
$uPass = md5($_POST["newPass"]);

$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "UPDATE USERS SET passWord = '$uPass' WHERE Uid = '$Uid'";
if($conn->query($sql) == TRUE){
  echo "Password has been updated.";
  header("Location:changeDetails.php");
} else {
			echo "Error updating table: " . $conn->error;
		}	
	}
}
$conn->close();
?>
