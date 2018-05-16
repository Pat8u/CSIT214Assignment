 <?php
require 'sqlinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
echo $servername;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Create database
$sql = "CREATE DATABASE " . $dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$conn = new mysqli($servername, $username, $password,$dbname);
// Create tables
$sql = "CREATE TABLE USERS (
Uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userName VARCHAR(30) NOT NULL,
passWord VARCHAR(50) NOT NULL,
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(50),
regDate TIMESTAMP
)";
if($conn->query($sql) === TRUE){
	echo "\n\r USERS Table created";
}
else {
	echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE EVENTS (
Eid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT,
edate DATETIME,
creationedate TIMESTAMP,
location VARCHAR(200),
coordinatorid INT(6) UNSIGNED,
FOREIGN KEY (coordinatorid) REFERENCES USERS(Uid)
)";
if($conn->query($sql) === TRUE){
	echo "\r\n EVENTS Table created ";
}
else {
	echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE UNAPPEVENTS (
Eid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT,
edate DATETIME,
creationedate TIMESTAMP,
location VARCHAR(200),
coordinatorid INT(6) UNSIGNED,
FOREIGN KEY (coordinatorid) REFERENCES USERS(Uid)
)";
if($conn->query($sql) === TRUE){
	echo "\r\n Unapproved EVENTS Table created ";
}
else {
	echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE BOOKINGS (
Bid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Uid INT(6) UNSIGNED,
Eid INT(6) UNSIGNED,
bookingDate TIMESTAMP,
additionalInfo TEXT,
FOREIGN KEY (Eid) REFERENCES EVENTS(Eid),
FOREIGN KEY (Uid) REFERENCES USERS(Uid)
)";
if($conn->query($sql) === TRUE){
	echo "\r\n BOOKINGS Table created";
}
else {
	echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE ADMIN (
Uid INT(6) UNSIGNED PRIMARY KEY,
adminLvl INT(2),
role VARCHAR(30),
FOREIGN KEY(Uid) REFERENCES USERS(Uid)
)";
if($conn->query($sql) === TRUE){
	echo "\r\n ADMIN Table created";
}
else {
	echo "Error creating table: " . $conn->error;
}
$password = md5(pass);
//creating a placeholder user
$sql = "INSERT INTO USERS (userName,passWord,firstName,lastName) VALUES('py802','$password','patrick','placeholders')";
if($conn->query($sql) === TRUE){
	echo "\r\n User inserted";
}
else {
	echo "Error inserting user: " . $conn->error;
}
$sql = "INSERT INTO ADMIN (Uid,adminLvl,role) VALUES(1,1,'Superuserplaceholder')";
if($conn->query($sql) === TRUE){
	echo "\r\n User inserted";
}
else {
	echo "Error inserting user: " . $conn->error;
}
$conn->close();

?> 