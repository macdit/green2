<?php
    // Include load.php file, but terminate 
    // if any fatel errors, & stop execution
    require "initialize/load.php";
?>
<?php
    //include the site header
    require "elements/header.php";
?>	


<?php
// connect to the database
$conn = new mysqli('localhost', 'root', 'pass123', 'boat') OR die(mysqli_error($conn));

if(isset($_POST['update']))



{	
    // Get posted values via POST() method
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$disease = mysqli_real_escape_string($mysqli, $_POST['disease']);
	$d_name = mysqli_real_escape_string($mysqli, $_POST['d_name']);
    $p_name = mysqli_real_escape_string($mysqli, $_POST['p_name']);
    $r_effectiveness = mysqli_real_escape_string($mysqli, $_POST['r_effectiveness']);
	$r_affordability = mysqli_real_escape_string($mysqli, $_POST['r_affordability']);
    $r_availability = mysqli_real_escape_string($mysqli, $_POST['r_availability']);	
    $created_date = mysqli_real_escape_string($mysqli, $_POST['created_date']);
	//$comments = mysqli_real_escape_string($mysqli, $_POST['comments']);
	
	
	// checking empty fields
    if(empty($disease) || empty($d_name) || empty($p_name) || empty($r_effectiveness) || empty($r_affordability) || empty($r_availability)) {	
			
		if(empty($disease)) {
			echo "<font color='red'>Disease field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Drug field is empty.</font><br/>";
		}	
		if(empty($email)) {
			echo "<font color='red'>Pharmacy field is empty.</font><br/>";
        }
        if(empty($r_effectiveness)) {
			echo "<font color='red'>Effectiveness field is empty.</font><br/>";
		}
		
		if(empty($r_affordability)) {
			echo "<font color='red'>Effordability field is empty.</font><br/>";
		}
		
		if(empty($r_availability)) {
			echo "<font color='red'>Availability field is empty.</font><br/>";
        }
        			
       } else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE ratings SET disease='$disease', d_id='$d_name',p_id='$p_name' ,r_effectiveness='$r_effectiveness', r_affordability='$r_affordability' ,r_availability='$r_availability' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: myratings.php");
	}
}
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ratings WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$disease = $res['disease'];
	$d_name = $res['d_name'];
    $p_name = $res['p_name'];
    $r_effectiveness = $res['r_effectiveness'];
	$r_affordability = $res['r_affordability'];
    $r_availability = $res['r_availability'];

?>

<head>	
	<title>Edit My Ratings </title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="edit_form" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Disease</td>
				<td><input type="text" name="disease" value="<?php echo $disease;?>"></td>
			</tr>
			<tr> 
				<td>Drug</td>
				<td><input type="text" name="d_name" value="<?php echo $d_name;?>"></td>
			</tr>
			<tr> 
				<td>Pharmacy</td>
				<td><input type="text" name="p_name" value="<?php echo $p_name;?>"></td>
			</tr>
            <tr> 
				<td>Effectiveness</td>
				<td><input type="text" name="r_effectiveness" value="<?php echo $r_effectiveness;?>"></td>
			</tr>
			<tr> 
				<td>Affordability</td>
				<td><input type="text" name="r_affordability" value="<?php echo $r_affordability;?>"></td>
			</tr>
			<tr> 
				<td>Availability</td>
				<td><input type="text" name="r_availability" value="<?php echo $r_availability;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>

</html>
'}'