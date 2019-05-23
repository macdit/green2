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
	<p>The Green Boat Mobile application is a platform that helps users/patients
	   quickly allocate drugs that are effective, affordable for malaria, typhoid,
	   and cholera in South Sudan, Africa. Registered users are given a chance to 
	   rate their drugs’ past usage experiences which are ranked based on their 
	   effectiveness, affordability, and availability. This application is the voice
	   of the users since it mainly displays their opinions after the treatment. 
	   It is possible for public health authorities private or public to utilize our
	   drugs ratings to make some decisions regarding combating Malaria, Typhoid, and
	   Cholera in South Sudan. The green boat founders do not hold any responsibility
	   on any of display drugs ratings since they are supplied by the public. The 
	   pharmaceutical suppliers and vendors might use our rating to get authentic 
	   patients’ feedbacks regarding their medications which might yield major drugs
	   improvement. The application also will help the user spot counterfeit drugs or
	   less effective drugs based on data-driven evolutions.
	</p>
	<p>
		<h3>The Green Boat Platform:</h3>
		* Helping public finds effective & affordable drugs for Malaria, Typhoid, and Cholera.<br>
		* Helping public makes data-driven decision to combat counterfeit & poor-quality drugs.<br>
		* Gives public power to clean local market off fake drugs quickly & effectively.<br>
		* Analytic tool that can help public re-think how they can fight malaria and typhoid in South Sudan effectively.<br>
	</p>
	</div>
	<?php
	require "elements/footer.php";
   ?>
</body>
</html>