<?php
    //Connect to the database and display error if failed
    $conn = new mysqli('localhost', 'root', 'pass123', 'boat') or die(mysqli_error($conn));

    //Check if the contact data are are submitted
    if(isset($_POST['sent'])){
        //Store form variables for easy processing
        $name = $_POST['fullName'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        //Insert the user's record to the database
        $conn->query("INSERT INTO contact (name,address, phone, email, comment) VALUES('$name','$address','$phone','$email','$comment')") or die($conn->error);
        header("Location: thanks.php");
    }
?>