<?php
session_start();

//initializing variables 

$username = "";
$email = "";

$errors = array();

$db = mysqli_connect('localhost','root','','loginReg') or die("could not connect to databse");

//Register users

if(isset($_POST['username']) && isset($_POST['password_1']) && isset($_POST['email'])){
  	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
}



//for validation

if(empty($username)) {array_push($errors, "Username is required");}
if(empty($password_1)) {array_push($errors, "Password is required");}
if(empty($email)) {array_push($errors, "email is required");}


// check db for  existing user with same username

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user) {
	if($user['username'] === $username){array_push($errors, "username already exist");}
	if($user['email'] === $email){array_push($errors, "email already exist");}
}

// Register the userif no error

if(count($errors) == 0){
	$password = md5($password_1); //this will encrypt the password
	$query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
	mysqli_query($db, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "Your are now logged in";
}else{
	echo 'you sure you didnt something wrong?';
}