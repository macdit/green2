<?php
	require"initialize/load.php";
?>
<?php
if(!isset($_SESSION["valid_user_email"])){
	header("Location: index.php");
}
?>
<?php
	require "elements/validuser_header.php";
?>
<!DOCTYPE html>
<html>
	
<body>
	<div class="jumbotron">
	  <h1> Welcome <?=$_SESSION["u_first"].'!'?></h1>
	  <p class="lead"> Please, use below form to rate your recent used drugs. </p>
      
       <?php 

       //Set EST timezone
       $timezone = date_default_timezone_set('America/New_York');

       // Get current time
       echo date('l jS \of F Y h:i:s A');
       //echo date('l, F j, Y');
      
      ?>


	</div>
	<div class="row">
		<div class="container">
			<h2> Rate a Drug </h2>
			<form method="POST">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					 	Select Disease:
				
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					 <a class="dropdown-item" href="#">Malaria</a>
					 <a class="dropdown-item" href="#">Malaria</a>
					 <a class="dropdown-item" href="#">Cholera</a>
				</div>
			    </button>
				</div>

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
				    <label for="uname">UserName</label>
				    <input type="text" class="form-control" id="uname" aria-describedby="uname" name="uname" placeholder="Enter UserName">
				</div>

				<div class="form-group">
				    <label for="inputpassword">Password</label>
				    <input type="password" class="form-control" id="inputpassword" placeholder="Enter your Password" name="inputpassword">
				</div>
				<button type="submit" name="sign_up" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>