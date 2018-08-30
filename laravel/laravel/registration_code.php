<?php
require_once('connection.php');
$fname = lname = $email = $username = $password = $pwd = '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$user = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO tbluser (Firstname, Lastname, Email, Username, Password)
	VALUES ('$fname', '$lname', '$email', '$user', '$password')";
	
	$result = mysqli_query($conn, $sql)
	
	if($result)
	{
	header("Location: login.php;
	}else(
	echo "Error":.$sql;
	)
?>