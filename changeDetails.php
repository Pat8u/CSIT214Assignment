
<html>
<head>

<title> Change Details Page </title>

</head>

<body>
<div id ="link_header"><ul>
<li><a href = "/"> Home </a> </li>
<li><a href = "/eventcreation.html"> Event Creation </a> </li>
<li><a href = "AdminPanel.php">AdminPanel</a></li>
<li><a href = "createUser.php">Create User</a></li>
<li><a href = "login.php">Login</a></li>
<li><a href = "changeDetails.php">Change Details</a></li>
<li><a href = "logout.php">logout</a></li>
<li><a href = "ViewOwnEvents.php">View Own events</a></li>
</ul>
</div>

<?php 
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];
$conn = new mysqli($servername, $username, $password,$dbname);
$qry = "SELECT userName, firstName FROM USERS WHERE Uid = $Uid";
if($Uid != NULL){
$results = mysqli_query($conn,$qry);

	$rows = $results -> fetch_assoc();
	echo 'This is the change details page for Username:  '.$rows["userName"].'<br /> First Name:  '. $rows["firstName"];
}

?>

<p>Change Password</p>
<form action="/changePass.php" method="post">
Old password:
<input type = "password" name = "uPassword"><br>
New password:
<input type = "password" name = "newPass"><br>
<input type = "submit" name="submit" value = "Submit" />
</form>
<br>
<p>Change Name</p>
<form action="/changeName.php" method="post">
First Name:
<input type = "text" name = "fName"><br>
Last Name:
<input type = "text" name = "lName"><br>
<input type = "submit" name="submit" value = "Submit" />
</form>

</body>
</html>

<?php



if($Uid != NULL){
	
	} else {
	echo 'Please login to change account details';
	header("Location:login.php");
	}

$conn -> close;
?>