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
		<h2 class="text-center" style="margin-bottom: 30px; margin-top: 20px;"> The Overall Rated Drugs</h2>
	
	</div>
	<div class="container">
	<div class="row">
		<div class="col">
			<p class="bg-primary text-white"> The top rated drugs for Malaria, Typhoid, & Cholera </br>
			    based on their effectiveness, affordability, & availability:</p>
			<?php
			$topRatedDrugs =  new ratings();
			$topRatedDrugs->topRatedDrugs('all');	
			?>
		</div>
	</div>
	</div>
	<?php
	require "elements/footer.php";
   ?>
</body>
</html>