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
	<?php
		$my_rating = new Ratings;
        $my_rating->getMyRatings();
    ?>
</body>
