
<html>
<head>

<title>Create account page</title>
	
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
<form action="" method="post">
Username:
<input type = "text" name = "uName"><br>
Password:
<input type = "password" name = "uPassword"><br>
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

if(isset($_POST['submit'])){

$uName = htmlspecialchars($_POST["uName"]);
$uPass = md5($_POST["uPassword"]);
$fName = htmlspecialchars($_POST["fName"]);
$lName = htmlspecialchars($_POST["lName"]);

$conn = new mysqli($servername, $username, $password,$dbname);
$qry = "SELECT userName FROM USERS WHERE userName='$uName'";

$result = mysqli_query($conn,$qry);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result) != 0){
	echo "UserName already taken, Please pick another.";
	}
    else{  
		$sql = "INSERT INTO USERS (userName,passWord,firstName,lastName) VALUES('$uName','$uPass','$fName','$lName')";
		if($conn->query($sql) === TRUE){
			header("Location:login.php");
			
		}
		else {
			echo "Error creating table: " . $conn->error;
		}	
	}

}
$conn->close();

?>