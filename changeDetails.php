<html>
<head>

<title> Change Details Page </title>
<script>
function compare() {
	var password1, password2;
	password1 = getElementById("pass1").value;
	password2 = getElementById("pass2").value;
	
	if(password1 == password2){
		return true;
	} else {
		return false;
	}
}
</script>
</head>

<body>
<div id ="link_header"><ul>
<li><a href = "/"> Home </a> </li>
<li><a href = "/eventcreation.html"> Event Creation </a> </li>
<li><a href = "AdminPanel.php">AdminPanel</a></li>
<li><a href = "createUser.php">Create User</a></li>
<li><a href = "login.php">Login</a></li>
<li><a href = "changeDetails.php">Change Details WIP(BRAYDON NEEDS TO DO THIS)</a></li>
<li><a href = "logout.php">logout WIP(BRAYDON NEEDS TO DO THIS)</a></li>
<li><a href = "ViewOwnEvents.php">View Own events</a></li>
</ul>
</div>

<form action="changePass.php" method="post" onSubmit="compare()">
Old password:
<input type = "password" name = "uPassword"><br>
New password
<input type = "password" name = "newPass" id="pass1"><br>
Repeat new Password:
<input type = "password" name = "newPass2" id="pass2"><br>
<input type = "submit" name="submit" value = "Submit" />
</form>
<br><br>
<form action="changeName.php" method="post">
First Name:
<input type = "text" name = "fName"><br>
Last Name:
<input type = "text" name = "lName"><br>
<input type = "submit" name="submit" value = "Submit" />
</form>

</body>
</html>

<?php
require 'sqlinfo.php';
session_start();
$Uid = $_SESSION["Uid"];
$conn = new mysqli($servername, $username, $password,$dbname);

if(ISSET $_SESSION["Uid"]){
	
	} else {
	echo "Please login to change account details";
	header("Location:login.php");
	}
  $conn->close();
?>
