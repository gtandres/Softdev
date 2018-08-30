<?php
$conn = mysqli_connect("localhost", "root", "1234". "registrationdb");

	if(!$conn){
		echo "Database connection failed.";
	}
?>