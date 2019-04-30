<?php
    // Include load.php file, but terminate 
    // if any fatel errors, & stop execution
	require"initialize/load.php";
?>
<!DOCTYPE html>
<html>
<?php
	require "elements/header.php";
?>	
<body>
	<div>
		<h2 class="text-center" style="margin-bottom: 30px; margin-top: 20px;"> Welcome to the Green Boat Platform!</h2>
	
	</div>
	<div class="row">
		<div class="col">
			<main class="hero-section">
			<div class="container">
				<h2 class="text-center" style="margin-bottom: px50; margin-top: 10px;">
				Join the fight to help us eliminate Malaria, Typhoid, and Cholera in 
				South Sudan. </h2>
			<div class="text-center">
				<a href="register.php" class="btn btn-primary">Sign up</a>
				<a href="about.php" class="btn btn-secondary">Learn more</a>
			</div>
			</div>
			<div class="clearfix">
			</div>
		</div>
       </main>
		<div class="col">  
			<img src="img/malariakills.jpg" class="myImage" alt="sign" width="600" height="345">
			<style>
				.myImage {
					height: 300px;
					border-radius: 100%;
					border-style: hidden;
					border-color:white;
					margin-top: 40px
				}
			</style>
		</div>
	</div>
	<?php
	require "elements/footer.php";
   ?>
</body>
</html>