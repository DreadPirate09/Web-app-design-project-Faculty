
<!DOCTYPE html>
<html>
<head>
<title>Login and Registration</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="back">
		<button onclick="goBack()">Go Back</button>
	</div>
	<div class="login-page">
	<div class="form">
		<form class="register-form" action="loginsignin.php" method="post">
			<?php include('server.php')?>
			<div>
				<input type="text" placeholder="user name" name="username" required>
			</div>
			<div>
				<input type="text" placeholder="password" name="password_1" required>
			</div>
			<div>
				<input type="text" placeholder="email id" name="email" required>
			</div>
			<button type="submit" name="reg_user">Create</button>
			<p class="message">Already Registered? <a href="#">Login</a>
		</form>
		<form class="login-form" action="loginsignin.php" method="post">
			<?php include('loginserv.php')?>
			<div>
				<input type="text" placeholder="user name" id="user" name="user" required>
			</div>
			<div>
				<input type="password" placeholder="password" id="pass" name="pass" required>
			</div>
			<button type="submit" name="login_user">login</button>
			<span><?php echo $invalid; ?></span>
			<p class="message"> Not Registered? <a href="#">Register</a></p>
		</form>
	</div>
	</div>	

	<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
	<script>
		$('.message a').click(function(){
			$('form').animate({height:"toggle",opacity:"toggle"},"slow");
		});
		function goBack() {
			window.history.back();
		}
	</script>
</body>
</html>