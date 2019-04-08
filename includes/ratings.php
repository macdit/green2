<?php
	class ratings{
        protected $ratings = "ratings";

    public function add_rating($uid,$disease,$did,$effect,$afford,$avail){
        $conn = new mysqli("localhost", "root", "pass123", "boat"); 
        $sql ="INSERT INTO $this->ratings (mid,disease,d_id,r_effectiveness,r_affordability,
        r_availability) VALUES ('$uid','$disease','$did','$effect','$afford','$avail');";
        $result = mysqli_query($conn, $sql);
        echo '<p class="alert alert-success text-center" role="alert">Record Saved Successfully</p>';
    
    }
}
