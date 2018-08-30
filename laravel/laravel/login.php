<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="login.css" />
</head>
<style>
input[type=text] {
    width: 35%;
    padding: 12px 20px;
    margin: 5px 0;
    box-sizing: border-box;
    border: none;
    background-color: #f2f2f2;
    color: black;
}
input[type=password] {
    width: 35%;
    padding: 12px 20px;
    margin: 5px 0;
    box-sizing: border-box;
    border: none;
    background-color: #f2f2f2;
    color: black;
}
input[type=submit] {
    width: 15%;
    padding: 12px 20px;
    margin: 5px 0;
    box-sizing: border-box;
    border: none;
    background-color: blue;
    color: white;
}
</style>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: Rooms.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="container">
<div class = "no-results">
<form action="" method="post" name="login">
 Username: <input type="text" name="username" placeholder="Username" required /> </br>
 Password: <input type="password" name="password" placeholder="Password" required /></br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</div>
<?php } ?>
</body>
</html>