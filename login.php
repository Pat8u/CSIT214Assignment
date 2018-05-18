
 
<html>
<head>

<title> Login Page </title>

</head>

<body>
<div id ="link_header"><ul>
<li><a href = "/"> Home </a> </li>
<li><a href = "AdminPanel.php">AdminPanel</a></li>
<li><a href = "createUser.php">Create User</a></li>
<li><a href = "login.php">Login</a></li>
<li><a href = "changeDetails.php">Change Details WIP(BRAYDON NEEDS TO DO THIS)</a></li>
<li><a href = "logout.php">logout WIP(BRAYDON NEEDS TO DO THIS)</a></li>
<li><a href = "ViewOwnEvents.php">View Own events</a></li>
</ul>
</div>
<form action="" method="post">

    <table width="200" border="0">
  <tr>
    <td>UserName</td>
    <td> <input type="text" name="uName" > </td>
  </tr>
  <tr>
    <td>PassWord</td>
    <td><input type="password" name="uPass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>
<?php
require 'sqlinfo.php';

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
    $uName = htmlspecialchars($_POST['uName']);
    $uPass = md5($_POST['uPass']);
    
  $conn = new mysqli($servername, $username, $password,$dbname);
  $qry = "SELECT userName, Uid FROM USERS WHERE userName='$uName' and passWord='$uPass'";
   
  $result = mysqli_query($conn,$qry);
  
  if(!$result || mysqli_num_rows($result) === 0){
    echo "Error logging in. The username or password does not match";

  }
    else{  
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['Uid']  = $row['Uid'];
    
    $_SESSION['uName']  = $uName;
    header("Location:index.html"); //index.html??
  }

}
  $conn->close();
?>