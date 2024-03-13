<?php
    include 'config.php';
    $msg = "";
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            header("Location: index3.php");
        } else {
            $msg ="<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login & Registration</title>
	<link rel="stylesheet" href="css/style5.css">
</head>
<body>
	<div class="container">
		<div id="LoginAndRegistrationForm">
			<h1 id="formTitle">Login</h1>
			<div id="formSwitchBtn">
				<button onclick="ShowLoginForm()"  id="ShowLoginBtn" class="active">Login</button>
				<!-- <button onclick="ShowRegistrationForm()"  id="ShowRegistrationBtn">Registration</button> -->
			</div>
			<div id="LoginFrom">
            <form action="" method="post">
					<div class="center">
						<input id="LoginEmail" class="input-text" name="email" type="text" placeholder="Email Address"> 
						<input id="LoginPassword" class="mt-10 input-text" name="password" type="password" placeholder="Password">
					</div>
					
					<div class="forgot-pass-remember-me mt-10">
						<div class="forgot-pass">
							<a id="ForgotPassword" href="JavaScript:void(0);" onclick="ShowForgotPasswordForm()" >Forgot Password?</a>
						</div>
						<div class="remember-me">
							<input id="rememberMe" type="checkbox">
							<label for="rememberMe">Remember Me</label>
						</div>
					</div>

					<div class="center mt-20">
						<input onclick="return ValidateLoginForm();"  class="Submit-Btn" type="submit" name="submit" value="Login" id="LoginBtn">
					</div>
				</form>
				<p class="center mt-20 dont-have-account">
					Don't have an account? 
					<a href="JavaScript:void(0);" onclick="ShowRegistrationForm()">Registration now</a>
				</p>
			</div>
			
			<div id="ForgotPasswordForm">
				<form action="">
					<div class="center mt-20">
						<input class="input-text " type="email" id="forgotPassEmail" placeholder="Email Address">
					</div>
					<div class="center mt-20">
						<input onclick="return ValidateForgotPasswordForm();" class="Submit-Btn" type="submit" value="Reset Password" id="PasswordResetBtn" >
					</div>
				</form>
				<p class="center mt-20 already-have-account">
					Back to the 
					<a href="JavaScript:void(0);" onclick="ShowLoginForm()">Login page</a> | <a href="JavaScript:void(0);" onclick="ShowRegistrationForm()">Registration page</a>
				</p>
			</div>
		</div>
	</div>

	<script src="main.js" type="text/javascript"></script>
	<script src="validation.js" type="text/javascript"></script>
    <script type="text/javascript" src="script.js"></script>

<script src="jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>
</html>