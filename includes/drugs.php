<?php
	//Create user class
	class drugs{
        protected $drugs = "drugs";
       
       // Get drugs for malaria, typhoid, and cholera 
        public function getMalariaDrugs(){

            // Connect to the db.
            $conn = new mysqli("localhost", "root", "pass123", "boat");

            // Retrive malaira drugs info
            $malariaDrugs = "SELECT * FROM $this->drugs  WHERE d_use = 'malaria'";
            $query = mysqli_query($conn, $malariaDrugs);
            echo '<select class="custom-select" id="malariaDrugs" 
            name="malariaDrugs" style="display:none">';
            while( $result = mysqli_fetch_assoc($query)){      
			    echo '<option value='.$result['d_id'].'>'.$result['d_name'].'</option>';
            }
           echo '</select>';
        }
    
        // Get drugs for malaria, typhoid, and cholera 
        public function getTyphoidDrugs(){

            // Connect to db.
            $conn = new mysqli("localhost", "root", "pass123", "boat");

            // Retrive malaira drugs info
            $typhoidDrugs = "SELECT * FROM $this->drugs  WHERE d_use = 'typhoid'";
            $query = mysqli_query($conn, $typhoidDrugs);
            echo '<select class="custom-select" id="typhoidDrugs" 
            name="typhoidDrugs" style="display:none">';
            while( $result = mysqli_fetch_assoc($query)){      
                echo '<option value='.$result['d_id'].'>'.$result['d_name'].'</option>';
            }
            echo '</select>';
        }

    // Get drugs for malaria, typhoid, and cholera 
    public function getCholeraDrugs(){

        // Connect to db.
        $conn = new mysqli("localhost", "root", "pass123", "boat");

        // Retrive malaira drugs info
        $choleraDrugs = "SELECT * FROM $this->drugs  WHERE d_use = 'cholera'";
        $query = mysqli_query($conn, $choleraDrugs);
        echo '
            <select class="custom-select" id="choleraDrugs" 
            name="choleraDrugs" style="display:none">';
        while( $result = mysqli_fetch_assoc($query)){      
            echo '<option value='.$result['d_id'].'>'.$result['d_name'].'</option>';
        }
        echo '</select>';
    }
}
