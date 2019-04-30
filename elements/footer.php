
<p class="text-center" style="margin-bottom: 10px; margin-top: 40px;">
<?php
// Display dynamic copy right line
function dynamicCopyRight($startYear){
	$thisYear = date('Y');
	if ($startYear < $thisYear){
		$thisYear = date('Y');
		return "&copy; $startYear&ndash;$thisYear". 'The Green Boat Platform';
	} else {
		return "&copy; $startYear". ' The Green Boat Platform';
	}
}

//Get the current year & compute the copyright display
$currentYear = date('Y');
echo dynamicCopyRight($currentYear);

?>

</body>
</html>