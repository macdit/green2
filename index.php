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
		<h2 class="text-center" style="margin-bottom: 30px; margin-top: 20px;"> Welcome to the Green Boat </h2>
	
	</div>
	<div class="row">
		<div class="col">
			<p> The top 10 effective drugs dashboard visualization </p>
		</div>
		<div class="col">
			<img src="img/malariakills.jpg" alt="sign" width="600" height="345">	
		</div>
		
	</div>
	<?php
	require "elements/footer.php";
   ?>
</body>
</html>