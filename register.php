<?php
	require"initialize/load.php";
?>
<?php
	require "elements/header.php";
?>
<!DOCTYPE html>
<html>	
<body>
	<?php
		$add_users = new Users;
		if(isset($_POST["sign_up"])){
			$firstname = $_POST["fname"];
			$lastname = $_POST["lname"];
			$useremail = $_POST["inputEmail"];
			$username = $_POST["uname"];
			$userpass = $_POST["inputpassword"];
			$add_users -> addUser($firstname, $lastname, $useremail, $username, $userpass);
		}

	?>

	<div class="container">
		<div class="text-center">
			<h2> Create an Account </h2>
			<h5>It's free and only takes a minute.</h5>
		</div>
			<form  action="register.php" method="POST">
				<div class="form-group">
				   	<label for="fname">First Name</label>
				    <input type="text" class="form-control" id="fname" name="fname" 
				    aria-describedby="fname" placeholder="Enter First Name">
				</div>
				<div class="form-group">
				    <label for="lname">Last Name</label>
				    <input type="text" class="form-control" id="lname" name="lname" 
				    aria-describedby="lname" placeholder="Enter Last Name">
				</div>
				<div class="form-group">
				    <label for="inputEmail">Email address</label>
				    <input type="email" class="form-control" id="inputEmail" name="inputEmail"
				    aria-describedby="inputEmail" placeholder="Enter your e-mail">
				</div>
				<div class="form-group">
				    <label for="uname">Username</label>
				    <input type="text" class="form-control" id="uname" aria-describedby="uname" name="uname" placeholder="Enter UserName">
				</div>
				<div class="form-group">
				    <label for="inputpassword">Password</label>
				    <input type="password" class="form-control" id="inputpassword" placeholder="Enter your Password" name="inputpassword">
				</div>
				<button type="submit" name="sign_up" class="btn btn-primary">Sign Up</button>
			</form>
		</div>
		</div>
</body>
</html>
<?php
	require "elements/footer.php";
?>

