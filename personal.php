<?php
	require"initialize/load.php";
?>
<?php
if(!isset($_SESSION["valid_user_email"])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
	
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
		        <a class="nav-link" href="overallRatedDrugs.php">Drugs</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="overallRatedPharmacies.php">Pharmacies</a>
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
					<a class="nav-link" href="myratings.php"><?= $_SESSION["u_first"]. "'s Profile"?>
					</a>
			  </li>
			  <li class="nav-item">
		        <a button class="btn btn-primary" href="login.php">Logout</a>
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
	<body>
	
<body>
	<?php
		$new_rating = new Ratings;
		if(isset($_POST["submitRating"])){
			$user = $_SESSION['u_id'];
			$diseasename = $_POST["dieases"];
			if($diseasename == 'malaria'){
				$drugname = $_POST["malariaDrugs"];
			}
			if($diseasename == 'typhoid'){
				$drugname = $_POST["typhoidDrugs"];
			}
			if($diseasename == 'cholera'){
				$drugname = $_POST["choleraDrugs"];
			}
			$effect = $_POST["effect"];
			$afford = $_POST["afford"];
			$avail = $_POST["available"];
			$pharmacyNames = $_POST["pharmacyNames"];
			$new_rating->add_rating($user, $diseasename, $drugname, $effect, $afford, $avail, $pharmacyNames);
		}
	?>
   <div class="container">
	<div class="jumbotron" style="margin-bottom: 5px; margin-top: 5px;">
	  <h1> Welcome <?=$_SESSION["u_first"].'!'?></h1>
	  <h4 class="lead"> Please, use below form to rate your recent used drugs. </h4>
      
       <?php 
       //Set EST timezone
       $timezone = date_default_timezone_set('America/New_York');
       // Get current time
       echo date('l jS \of F Y h:i:s A');
       //echo date('l, F j, Y');
      ?>
  </div>
  
	<div class="container" style="margin-bottom: 20px; margin-top: 10px;">
	<div class="row">
			<h2> Rate a Drug </h2>
			<form method="POST">
				<div class="row">
					<div class="col-2">
						<label>Sickness & Drug:</label>
					</div>
					<div class="col-5">
						<select class="custom-select" onchange="change(this)" 
								name="dieases" id="dieases" required>
							<option disabled selected value style="color:red">--Choose One--</option>
							<option value="malaria">Malaria</option>
							<option value="typhoid">Typloid</option>
							<option value="cholera">Cholera</option>
						</select>
					</div>
					<div class = "col-5">
						<?php
							// Create an instance of drug object
							//malaria, typhoid, and cholera 
							$getMalariaDrugs =  new Drugs();
							$getMalariaDrugs->getMalariaDrugs();

							$getTyphoidDrugs =  new Drugs();
							$getTyphoidDrugs->getTyphoidDrugs();

							$getCholeraDrugs =  new Drugs();
							$getCholeraDrugs->getCholeraDrugs();
						?>
					</div>
					<div class="col-2">
						<label>Select Pharmacy:</label>
					</div>
					<div class="col-5">
					  <!-- Create an instance of pharmacies & get pharmacy names -->
						<?php 
							$getPharmacyName =  new Pharmacies();
							$getPharmacyName->getPharmacyName();
						?>
						<!---
						<select class="custom-select" onchange="change(this)" 
								name="pharmacy" id="pharmacy" required>
							<option disabled selected value style="color:red">--Choose One--</option>
							<option value="riteAid">Rite Aid Pharmacy</option>
							<option value="walmart">Walmart pharmacy</option>
							<option value="cvs">CVS pharmacy</option>
							<option value="walgreens">Walgreens Pharmacy</option>
							<option value="elliot">Elliot Pharmacy</option>
						</select>
						-->
					</div>
				</div>
				<div class="row">
					<div col-4>
						<div class="form-group">
							<label for="effect">Rate Effectiveness</label>
							<select class="custom-select custom-select-lg mb-3 form-control" 
							id="effect" name="effect" required>
								<option disabled selected value style="color:red">--Choose One--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
					<div col-4>
						<div class="form-group">
							<label for="effect">Rate Affordability</label>
							<select class="custom-select custom-select-lg mb-3 form-control" 
								id="afford" name="afford" required>
								<option disabled selected value style="color:red">--Choose One--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
					<div col-4>
						<div class="form-group">
							<label for="effect">Rate Availability</label>
							<select class="custom-select custom-select-lg mb-3 form-control" 
							id="available" name="available" required>
								<option disabled selected value style="color:red">--Choose One--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
					<!-- Allow user to add comments/feedback-->
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Add additional comments about your experience using this drug:</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="8"></textarea>
					</div>
                    <!--Check to be notify if any related ratings-->
				</div>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheck1">
					<label class="custom-control-label" for="customCheck1">Check this box to be notify with any ratings related to this drug. </label>
				</div>
				<button type="submit" name="submitRating" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	</div>
</body>
	<script>
		function change(obj) {
			var selectBox = obj;
			var selected = selectBox.options[selectBox.selectedIndex].value;
			var malariaSelect = document.getElementById("malariaDrugs");
			var choleraSelect = document.getElementById("choleraDrugs");
			var typhoidSelect = document.getElementById("typhoidDrugs");

			if(selected === 'malaria'){
				malariaSelect.style.display = "block";
			}
			else{
				malariaSelect.style.display = "none";
			}
			if(selected === 'typhoid'){
			typhoidSelect.style.display = "block";
			}
			else{
			typhoidSelect.style.display = "none";
			}
			if(selected === 'cholera'){
				choleraSelect.style.display = "block";
			}
			else{
				choleraSelect.style.display = "none";
			}
		}
	</script>
		<?php
				require "elements/footer.php";
		?>
</html>


