<?php

$invalid=''; //Variable to store error message;
if (isset($_POST['login_user'])) {

	session_start();
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$password = md5($pass);

		$conn = mysqli_connect("localhost","root","");

		$db = mysqli_select_db($conn,"loginreg");

		$query = mysqli_query($conn,"SELECT * FROM user WHERE password='$password' AND username='$user'");

		$rows = mysqli_num_rows($query);

		if($rows == 1){
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $user;
			header("Location: dummyLogin.php");
			exit;
		}
		else{
			$invalid = "Incorrect";
			$_SESSION['loggedin'] = false;
		}
		mysqli_close($conn);
	}
}

