<?php
require_once('connection.php');

$user = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "SELECT * FROM tbluser WHERE Email = '$email' AND Password = '$password'";
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)) {
	$id = $row["ID"];
	$email = $row["Email"];
	session_start();
	$_SESSION['id'];
	$_SESSION['email'] = $email;
	}
		header ("Location: rooms.php");
	}

	else{
		echo "INVALID USERNAME or PASSWORD";
}
?>