<?php
	require"initialize/load.php";
?>
<?php
if(!isset($_SESSION["valid_user_email"])){
	header("Location: index.php");
}
?>
<head>
	<title>The Green Boat</title>
	<!--- Boostrap CDN for faster access via 
		https://getbootstrap.com/docs/4.3/getting-started/download/#bootstrapcdn -->
	<!-- Latest complied and modified CSS  -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Latest complied and modified JQuery  -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<!-- Latest complied and modified JavaScript  -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Use viewport meta to support mobile view-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- use fontawesome fonts via CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
</head>

<style>
.textstyle {
	font-family: 'Bitter', serif;
}
</style>
	<div class="textstyle">
		  <!-- Navbar contents --> 
		<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
		<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #d7f4d4;">
		  <a class="navbar-brand" href="index.php">The Green Boat</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="overallRatedDrugs.php">Drugs'Ratings</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="overallRatedPharmacies.php">Pharmacies'Ratings</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="about.php">About</a>
		      </li>
<!-- 			<li class="nav-item">
		        <a class="nav-link" href="healthInfo.php">Health Awareness</a>
		      </li> -->
		      <li class="nav-item">
		        <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
		        <a class="nav-link" href="myratings.php">My Ratings</a>
              </li>

			  <li class="nav-item">
		        <a button class="btn btn-primary" href="login.php">Logout</a>
		      </li>
              <li class="nav-item">
				<a class="nav-link" href="personal.php"><?= $_SESSION["u_first"]. "'s Profile"?>
				</a>
			  </li>
              </ul>
		       <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
			</div>
		</nav>
	</header>