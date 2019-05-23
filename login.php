<?php
	require"initialize/load.php";
?>
<?php
	if(isset($_SESSION['valid_user_email'])){
		unset($_SESSION['valid_user_email']);
		session_destroy();
		header("Location: login.php");
		exit();
	}
?>
<?php
	require "elements/header.php";
?>
<!DOCTYPE html>
<html>	
<body>
	<?php
		$auth_user = new Users;
		if(isset($_POST["login"])){
			$username = $_POST["uname"];
			$userpass = $_POST["inputpassword"];

				//Check if both fields are empty
				if($username == '' || $userpass ==''){
					// If false, redirect to the login page
					echo '<p class="alert alert-danger text-center" role="alert">The username or password cannot be empty</p>';
				} else {
			$auth_user -> userLogin($username, $userpass);
				}
		}

	?>
   <div class=container>
	<div class="container">
		<h2> Login </h2>
			<form method="POST">
				<div class="form-group">
				    <label for="uname">Username/Email</label>
				    <input type="text" class="form-control" id="uname" aria-describedby="uname" name="uname" placeholder="Enter your Username or E-mail">
				</div>

				<div class="form-group">
				    <label for="inputpassword">Password</label>
				    <input type="password" class="form-control" id="inputpassword" placeholder="Enter your Password" name="inputpassword">
				</div>
				<button type="submit" name="login" class="btn btn-primary">Sign in</button>
				<button type="submit" name="forgetpassord" class="btn btn-dark">Forget username/password</button>
				<a href="register.php"> Don't have an account? please sign up here</a>
			</form>
		</div>
		</div>
</body>
</html>
<?php
	require "elements/footer.php";
?>

    
