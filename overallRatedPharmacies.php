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
		<h2 class="text-center" style="margin-bottom: 30px; margin-top: 20px;"> The Overall Rated Pharmacies</h2>
	
	</div>
	<div class="container">
	<div class="row">
		<div class="col">
			<p class="text-center"> The top rated Pharmacies for Malaria, Typhoid, & Cholera sold drugs</br>
			     effectiveness, affordability, & availability:</p>
			<?php   
			$getMyPharRatings =  new ratings();
			$getMyPharRatings->topRatedPharmacies();
			?>
		</div>
	</div>
	</div>
	<?php
	require "elements/footer.php";
   ?>
   
</body>
</html>