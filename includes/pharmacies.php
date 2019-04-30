<?php
	//Create pharmacies class
	class pharmacies{
        protected $pharmacies = "pharmacies";
       
       // Get drugs for malaria, typhoid, and cholera 
        public function getPharmacyName(){

            // Connect to the db.
            $conn = new mysqli("localhost", "root", "pass123", "boat");

            // Retrive all pharmacies'names from pharmacies table
            $pharmacyNames = "SELECT * FROM $this->pharmacies";
            $query = mysqli_query($conn, $pharmacyNames);
            
            echo '
                <select class="custom-select " 
                name="pharmacyNames" id="pharmacyNames" required>
                <option disabled selected value style="color:red">--Choose One--</option>';
            while( $result = mysqli_fetch_assoc($query)){      
			    echo '<option value='.$result['p_id'].'>'.$result['p_name'].'</option>';
            }
           echo '</select>';
        }
    }
