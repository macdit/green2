<?php
	class ratings{
        protected $ratings = "ratings";
        protected $drugs = "drugs";

    public function add_rating($uid,$disease,$did,$effect,$afford,$avail,$pharmacyNames){
        // Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat"); 
        //Insert user's ratings to the database
        $sql ="INSERT INTO $this->ratings (mid,disease,d_id,r_effectiveness,r_affordability,
        r_availability,p_id) VALUES ('$uid','$disease','$did','$effect','$afford','$avail', '$pharmacyNames');";
        $result = mysqli_query($conn, $sql);
        //Display feedback to the user if insertion is successfully.
        echo '<p class="alert alert-success text-center" role="alert">Record Saved Successfully</p>';
    
    }

    //Method to retrive the top rated drugs of the selected diseases.
    public function topRatedDrugs(){
        //Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat"); 
        
        $malaria_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_effectiveness) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC LIMIT 10 ";
        $malaria_effect_query = mysqli_query($conn, $malaria_effect_sql);
        
        $cholera_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_effectiveness) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC  LIMIT 10";
        $cholera_effect_query = mysqli_query($conn, $cholera_effect_sql);
        
        $typhoid_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_effectiveness) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC LIMIT 10";
        $typhoid_effect_query = mysqli_query($conn, $typhoid_effect_sql);

        //availaibility sql
        $malaria_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 10";
        $malaria_avail_query = mysqli_query($conn, $malaria_avail_sql);
        
        $cholera_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 10";
        $cholera_avail_query = mysqli_query($conn, $cholera_avail_sql);
        
        $typhoid_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 10";
        $typhoid_avail_query = mysqli_query($conn, $typhoid_avail_sql);

        //affordability sql
        $malaria_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 10";
        $malaria_afford_query = mysqli_query($conn, $malaria_afford_sql);
        
        $cholera_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 10";
        $cholera_afford_query = mysqli_query($conn, $cholera_afford_sql);
        
        $typhoid_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 10";
        $typhoid_afford_query = mysqli_query($conn, $typhoid_afford_sql);
        

        echo '
        <ul class="nav nav-tabs" id="myTab0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab0" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Malaria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab0" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cholera</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab0" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Typhoid</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent0">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Effectiveness</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Affordability</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Availability</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent1">
                <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab1">
                    <ul class="list-group">';
                        while( $malaria_effect_result = mysqli_fetch_assoc($malaria_effect_query)){   
                            echo '<li class="list-group-item">'.$malaria_effect_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
                    <ul class="list-group">';
                        while( $malaria_afford_result = mysqli_fetch_assoc($malaria_afford_query)){   
                            echo '<li class="list-group-item">'.$malaria_afford_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab1">
                    <ul class="list-group">';
                        while( $malaria_avail_result = mysqli_fetch_assoc($malaria_avail_query)){   
                            echo '<li class="list-group-item">'.$malaria_avail_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
            </div>
            
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Effectiveness</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Affordability</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Availability</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                        <ul class="list-group">';
                            while($cholera_effect_result = mysqli_fetch_assoc($cholera_effect_query)){   
                                echo '<li class="list-group-item">'.$cholera_effect_result['dname'].'</li>';
                            }
                            echo '
                        </ul>  
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                        <ul class="list-group">';
                            while($cholera_afford_result = mysqli_fetch_assoc($cholera_afford_query)){   
                                echo '<li class="list-group-item">'.$cholera_afford_result['dname'].'</li>';
                            }
                            echo '
                        </ul>  
                    </div>
                    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                        <ul class="list-group">';
                            while($cholera_avail_result = mysqli_fetch_assoc($cholera_avail_query)){   
                                echo '<li class="list-group-item">'.$cholera_avail_result['dname'].'</li>';
                            }
                            echo '
                        </ul>  
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Effectiveness</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Affordability</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Availability</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent3">
                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                    <ul class="list-group">';
                        while($typhoid_effect_result = mysqli_fetch_assoc($typhoid_effect_query)){   
                            echo '<li class="list-group-item">'.$typhoid_effect_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    <ul class="list-group">';
                        while($typhoid_afford_result = mysqli_fetch_assoc($typhoid_afford_query)){   
                            echo '<li class="list-group-item">'.$typhoid_afford_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                    <ul class="list-group">';
                        while($typhoid_avail_result = mysqli_fetch_assoc($typhoid_avail_query)){   
                            echo '<li class="list-group-item">'.$typhoid_avail_result['dname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
            </div>

            </div>
        </div>
        ';
    }
}
