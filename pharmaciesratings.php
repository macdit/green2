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
    <?php 
        $displayPharmacy_drugs=new ratings();
        $displayPharmacy_drugs->displayPharmacy_drugs();
    ?>

</body>
</html>
