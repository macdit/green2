<?php
	//Create user class
	class users{
		protected $members = "members";

		public function addUser($first, $last, $email, $uid, $pwd){
				//Hash entered password
 				$encyptPwd = password_hash($pwd, PASSWORD_DEFAULT);
 				$conn = new mysqli("localhost", "root", "pass123", "boat");

 				// Validate user's inputs
 				$beforeSave = "SELECT user_email FROM $this->members WHERE user_email = '$email'";
 				$beforeSaveResult = mysqli_query($conn, $beforeSave);
 				if(mysqli_num_rows($beforeSaveResult) == 1){
 					echo '<p class="alert alert-danger text-center" role="alert">User already exists</p>';
 				}
 				else{
 					//Insert the new user to the database
	 				$sql ="INSERT INTO $this->members (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email','$uid', '$encyptPwd');";
	 				$result = mysqli_query($conn, $sql);

	 				// Validate user's inputs
	 				$checkValidation = "SELECT user_email FROM $this->members WHERE user_email = '$email'";
	 				$checkResult = mysqli_query($conn, $checkValidation);
	 				if(mysqli_num_rows($checkResult) == 1){
						 echo '<p class="alert alert-success text-center" role="alert">User Saved Successfully</p>';
						 header("Location: login.php");
	 				}
	 				else{
	 					echo '<p class="alert alert-danger text-center" role="alert">Unable to save your result</p>';
	 				}

 				}

		}

		public function userLogin($uid, $pwd){
			$conn = new mysqli("localhost", "root", "pass123", "boat");
			$sql = "SELECT * FROM members WHERE user_uid ='$uid' OR user_email='$uid'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck == 1){
				// Insert return user's data to raw
				if ($row = mysqli_fetch_assoc($result)){

					// Check if password inside db matched 
					//Entered password after de-hashing
					$verifyPasswordMatch = password_verify($pwd, $row['user_pwd']);

					//Check the result 
					if($verifyPasswordMatch == false){
						// If false, redirect to the login page
						echo '<p class="alert alert-danger text-center" role="alert">the username or password is incorrect</p>';
					} 
					else{
						// If entered password matched stored password
						// Login the user using session variable - superglable variable
						// Allowed user to login 

						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['valid_user_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];

	                    // Redirect user to the main page with login success
						header("Location: myratings.php");
					}
				}else{}
			}
			else{
				echo '<p class="alert alert-danger text-center" role="alert">Incorrect Login Details</p>';	
			}
		}
	}
?>