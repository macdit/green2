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
	<div class="text-center" style="margin-bottom: 20px; margin-top: 60px;">
		<h1> About Us </h1>
	</div>
	<div class="container">
	<p>The Green Boat Mobile application is a platform that helps
		users/patients quickly allocate drugs that are effective, affordable for 
		malaria,typhoid, and cholera in South Sudan, Africa. Registered 
		users are given a chance to rate their drugs’ past usage experiences
		which are ranked based on their effectiveness, affordability, and
		availability. This application is a voice of the users since it mainly
		displays their opinions after the treatment. It is possible for public
		health authorities private or public to utilize our drugs ratings to
		make some decisions regarding combating Malaria, Typhoid, and Cholera
		in South Sudan. The green boat founders do not hold any responsible on
		any of display drugs ratings since they are supplied by the public. 
		The pharmaceutical suppliers and vendors might use our rating to get 
		authentic patients’ feedbacks regarding their medications which might
		yield major drugs improvement. The application also will help user 
		spot counterfeit drugs or less effective drugs based on data-driven
		evolutions.</p>
	</div>
	<?php
	require "elements/footer.php";
   ?>
</body>
</html>