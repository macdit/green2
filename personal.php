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


