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

    <!-- Include processform.php file -->
    <?php
        require_once 'processform.php';
     ?>
     <!-- Display the record from the database -->
     <?php
        //Connect to the database and display error if failed
        $conn = new mysqli('localhost', 'root', 'pass123', 'boat') or die(mysqli_error($conn));
        $result = $conn->query("SELECT * FROM contact") or die($conn->error); 
    ?>
<body>
   <h2 class="text-center"> Contact US </h2>
   <div class="container">
   <div class="row">
        <div class="col">
           <!-- <div class="row justify-content-center"> -->
            <form action="processform.php" method="POST">
                <div class="form-group">
                <label> Full Name </label>
                <input type="text" name="fullName" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                <label> Address </label>
                <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                </div>
                <div class="form-group">
                <label> Phone </label>
                <input type="text" name="phone" class="form-control" placeholder="Enter your phone" required>
                </div>
                <div class="form-group">
                <label> Email </label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                <label> Please write comments or message. </label>
                <textarea type="text" name="comment" class="form-control" placeholder="Write your message" required></textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary" name="sent">Submit</button>
                </div>
            </form>
        </div>
        <div class="col"> 
                <div class="text-center" style="margin-bottom: 20px; margin-top: 60px;">
                    <h2>Mailing Address </h2>
                    <p align="center">
                        <h5> The Green Boat</h5>
                        3000 Pine Street
                        Manchester, NH 03103
                        1(800) 777- 9988
                    </p>   
                </div>
        </div>
    </div>
        <?php
        require "elements/footer.php";
         ?>
    </div>

    </body>