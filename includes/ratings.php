<?php
	class ratings{
        protected $ratings = "ratings";
        protected $drugs = "drugs";
        protected $pharmacies = "pharmacies";

    public function add_rating($uid,$disease,$did,$effect,$afford,$avail,$pharmacyNames){
        // Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat"); 
        //Insert user's ratings to the database
        $sql ="INSERT INTO $this->ratings (mid,disease,d_id,r_effectiveness,r_affordability,
        r_availability,p_id) VALUES ('$uid','$disease','$did','$effect','$afford','$avail', '$pharmacyNames');";
        $result = mysqli_query($conn, $sql);
        //Display feedback to the user if insertion is successfully.
        echo '<p class="alert alert-success text-center" role="alert">Thank you for your feedbacks!</p>';
        header("Location: myratings.php");
    
    }

    //Function to retrive the top rated drugs of the selected diseases.
    public function topRatedDrugs($allorten){

        //Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat"); 
        if($allorten == 'ten'){
            $malaria_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, 
            SUM(ratings.r_effectiveness) AS dsum FROM $this->ratings 
            LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
            GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC LIMIT 5 ";
        }
        else{
            $malaria_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, 
            SUM(ratings.r_effectiveness) AS dsum FROM $this->ratings 
            LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
            GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC ";
        }
        
        $malaria_effect_query = mysqli_query($conn, $malaria_effect_sql);
        
        $cholera_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_effectiveness) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC  LIMIT 5";
        $cholera_effect_query = mysqli_query($conn, $cholera_effect_sql);
        
        $typhoid_effect_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_effectiveness) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_effectiveness) DESC LIMIT 5";
        $typhoid_effect_query = mysqli_query($conn, $typhoid_effect_sql);

        //availaibility sql
        $malaria_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 5";
        $malaria_avail_query = mysqli_query($conn, $malaria_avail_sql);
        
        $cholera_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 5";
        $cholera_avail_query = mysqli_query($conn, $cholera_avail_sql);
        
        $typhoid_avail_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_availability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_availability) DESC LIMIT 5";
        $typhoid_avail_query = mysqli_query($conn, $typhoid_avail_sql);

        //affordability sql
        $malaria_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='malaria' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 5";
        $malaria_afford_query = mysqli_query($conn, $malaria_afford_sql);
        
        $cholera_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='cholera' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 5";
        $cholera_afford_query = mysqli_query($conn, $cholera_afford_sql);
        
        $typhoid_afford_sql = "SELECT ratings.d_id, drugs.d_name AS dname, SUM(ratings.r_affordability) 
        AS dsum FROM $this->ratings 
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id WHERE ratings.disease='typhoid' 
        GROUP BY ratings.d_id ORDER BY SUM(ratings.r_affordability) DESC LIMIT 5";
        $typhoid_afford_query = mysqli_query($conn, $typhoid_afford_sql);
        

        echo '
        <div class="container">
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
        </div>
        ';
    }
    public function displayPharmacy_drugs(){
        if (isset($_GET['p']) && isset($_GET['ratings'])){
            $pharmacy_id = $_GET['p'];
            $ratings_type = $_GET['ratings'];
            $conn = new mysqli("localhost", "root", "pass123", "boat");
            if($ratings_type == 'r_effectiveness'){
                $sql = "SELECT 
                drugs.d_name AS drug, ratings.r_effectiveness AS ratingtype, 
                ratings.created_date AS created FROM $this->ratings 
                LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id  
                WHERE ratings.p_id = $pharmacy_id";
            }
            
            $query = mysqli_query($conn, $sql);
            echo"<div class='text-center' style='margin-bottom: 20px; margin-top: 60px;'>
                <h1> Pharmacies's Ratings </h1>
            </div>
            <table class='table table-condensed table-bordered'>
                <tr class='success'>
                    <th>Drug</th>
                    <th>Ratings</th>
                    <th>Date Rated</th>
                </tr>";
            while($result = mysqli_fetch_assoc($query)){
                echo "<tr>
                        <td>".$result['drug']."</td>
                        <td>".$result['ratingtype']."</td>
                        <td>".$result['created']."</td>
                        </tr>";
            }
        }
    }
    function getMyRatings(){
        //Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat");
        $myid = $_SESSION['u_id'];
        $sql = "SELECT * FROM $this->ratings
        LEFT JOIN $this->drugs ON ratings.d_id = drugs.d_id  
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id
        WHERE ratings.mid = '$myid'
        ORDER BY ratings.id DESC";
        $query = mysqli_query($conn, $sql);
        echo'
        <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Disease</th>
                    <th scope="col">Drug</th>
                    <th scope="col">Pharmacy</th>
                    <th scope="col">Effectiveness</th>
                    <th scope="col">Affordability</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Date Created</th>
                </tr>
            </thead>
            <tbody>';
        while($result = mysqli_fetch_assoc($query)){
            echo'
                <tr>
                    <td>'.$result['disease'].'</td>
                    <td>'.$result['d_name'].'</td>
                    <td>'.$result['p_name'].'</td>
                    <td>'.$result['r_effectiveness'].'</td>
                    <td>'.$result['r_affordability'].'</td>
                    <td>'.$result['r_availability'].'</td>
                    <td>'.$result['created_date'].'</td>';
                echo '<td></td>
                </tr>';   
        }
           
           
           echo' <div class="container">       
                   
                </tbody>
                </table> </div>';
     
    }

    //Method to retrive the top rated pharmacies based on their sold drugs'
    //Effectiveness, affordability, and availability.
     //Method to retrive the top rated drugs of the selected diseases.
     public function topRatedPharmacies(){
        
        //Connect to the database
        $conn = new mysqli("localhost", "root", "pass123", "boat");
        //Retrun only the top rated pharmacies based
        
        $p_malaria_effect_sql = "SELECT ratings.p_id as rid, pharmacies.p_name AS pname, 
        SUM(ratings.r_effectiveness) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='malaria' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_effectiveness) DESC ";
    
        $p_malaria_effect_query = mysqli_query($conn, $p_malaria_effect_sql);
        
        
        $p_cholera_effect_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname, 
        SUM(ratings.r_effectiveness) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='cholera' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_effectiveness) DESC";
        $p_cholera_effect_query = mysqli_query($conn, $p_cholera_effect_sql);
        
        $p_typhoid_effect_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname,
        SUM(ratings.r_effectiveness) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='typhoid' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_effectiveness) DESC";
        $p_typhoid_effect_query = mysqli_query($conn, $p_typhoid_effect_sql);

        //availaibility sql
        $p_malaria_avail_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname,
        SUM(ratings.r_availability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='malaria' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_availability) DESC";
        $p_malaria_avail_query = mysqli_query($conn, $p_malaria_avail_sql);
        
        $p_cholera_avail_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname,
        SUM(ratings.r_availability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='cholera' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_availability) DESC";
        $p_cholera_avail_query = mysqli_query($conn, $p_cholera_avail_sql);
        
        $p_typhoid_avail_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname, 
        SUM(ratings.r_availability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='typhoid' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_availability) DESC";
        $p_typhoid_avail_query = mysqli_query($conn, $p_typhoid_avail_sql);

        //affordability sql
        $p_malaria_afford_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname, 
        SUM(ratings.r_affordability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='malaria' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_affordability) DESC";
        $p_malaria_afford_query = mysqli_query($conn, $p_malaria_afford_sql);
        
        $p_cholera_afford_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname,
        SUM(ratings.r_affordability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='cholera' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_affordability) DESC";
        $p_cholera_afford_query = mysqli_query($conn, $p_cholera_afford_sql);
        
        $p_typhoid_afford_sql = "SELECT ratings.p_id, pharmacies.p_name AS pname, 
        SUM(ratings.r_affordability) AS dsum FROM $this->ratings 
        LEFT JOIN $this->pharmacies ON ratings.p_id = pharmacies.p_id WHERE 
        ratings.disease='typhoid' AND ratings.p_id != ''
        GROUP BY ratings.p_id ORDER BY SUM(ratings.r_affordability) DESC";
        $p_typhoid_afford_query = mysqli_query($conn, $p_typhoid_afford_sql);
        

        echo '
        <ul class="nav nav-tabs justify-content-center" id="myTab0" role="tablist">
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
                        $ratingstype = "r_effectiveness";
                        while( $p_malaria_effect_result = mysqli_fetch_assoc($p_malaria_effect_query)){   
                            echo "<li class='list-group-item'>
                            <a href='pharmaciesratings.php?p=".$p_malaria_effect_result['rid']."&ratings=$ratingstype
                            '>
                                ".$p_malaria_effect_result['pname']."
                            </a>
                            </li>";
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
                    <ul class="list-group">';
                        while( $p_malaria_afford_result = mysqli_fetch_assoc($p_malaria_afford_query)){   
                            echo '<li class="list-group-item">'.$p_malaria_afford_result['pname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab1">
                    <ul class="list-group">';
                        while( $p_malaria_avail_result = mysqli_fetch_assoc($p_malaria_avail_query)){   
                            echo '<li class="list-group-item">'.$p_malaria_avail_result['pname'].'</li>';
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
                            while($p_cholera_effect_result = mysqli_fetch_assoc($p_cholera_effect_query)){   
                                echo '<li class="list-group-item">'.$p_cholera_effect_result['pname'].'</li>';
                            }
                            echo '
                        </ul>  
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                        <ul class="list-group">';
                            while($p_cholera_afford_result = mysqli_fetch_assoc($p_cholera_afford_query)){   
                                echo '<li class="list-group-item">'.$p_cholera_afford_result['pname'].'</li>';
                            }
                            echo '
                        </ul>  
                    </div>
                    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                        <ul class="list-group">';
                            while($p_cholera_avail_result = mysqli_fetch_assoc($p_cholera_avail_query)){   
                                echo '<li class="list-group-item">'.$p_cholera_avail_result['pname'].'</li>';
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
                        while($p_typhoid_effect_result = mysqli_fetch_assoc($p_typhoid_effect_query)){   
                            echo '<li class="list-group-item">'.$p_typhoid_effect_result['pname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    <ul class="list-group">';
                        while($p_typhoid_afford_result = mysqli_fetch_assoc($p_typhoid_afford_query)){   
                            echo '<li class="list-group-item">'.$p_typhoid_afford_result['pname'].'</li>';
                        }
                        echo '
                    </ul>  
                </div>
                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                    <ul class="list-group">';
                        while($p_typhoid_avail_result = mysqli_fetch_assoc($p_typhoid_avail_query)){   
                            echo '<li class="list-group-item">'.$p_typhoid_avail_result['pname'].'</li>';
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
