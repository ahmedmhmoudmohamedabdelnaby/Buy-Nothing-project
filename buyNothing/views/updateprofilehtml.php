
<?php

require_once '../models/user.php';
require_once '../controllers/DBController.php';
require_once '../controllers/updateprofileController.php';



if(isset($_POST['submit'])){
   //  if(!isset($_SESSION['user_id'])){
   //      session_start();
   //  }
    $user = new User ;
    $updateprofile = new update_profileController ;
    $user->setName($_POST['name']);
    
    $user->setEmail($_POST['email']);
   $user->setPassword(md5($_POST['password']));
    $user->setLocation($_POST['location']);
    $user->setPhoneNumber($_POST['phone_number']);
    $updateprofile->updateProfile($user);
   // $new_password = $_POST['password'];
 

    // Check if old password matches
    //$db_password = $user->getPassword();
   //  if (password_verify($old_password, $db_password)) {

   //      // Old password matches, update new password
   //      $user->setPassword(password_hash($new_password, PASSWORD_DEFAULT));
   //     //  $user->updateUserPassword();
   //      echo "Password changed successfully";
   //  } else {
   //      // Old password does not match
   //      echo "Old password does not match. Please try again.";
   //  }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}
		.container {
			background-color: #fff;
			padding: 20px;
			margin: 20px auto;
			max-width: 500px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type="text"], input[type="email"], input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 3px;
			background-color: #f9f9f9;
			box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 3px;
			cursor: pointer;
			float: right;
		}
		input[type="submit"]:hover {
			background-color: #2E8B57;
		}
	</style>
</head>
<body>
   
   
	<div class="container">
		<h1>Edit Profile</h1>
		<form method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" >

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" >

         <!-- <label for="old_password">Old Password:</label>
          <input type="password" id="old_password" name="old_password" required> -->

         <label for="new_password">New Password:</label>
          <input type="password" id="new_password" name="password" required>
<!-- 
           <label for="confirm_password">Confirm Password:</label>
          <input type="password" id="confirm_password" name="confirm_password" required> -->

         <label for="location">Location:</label>
         <input type="text" id="location" name="location" >

             <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone_number"required>

			<input type="submit"name="submit" value="Save Changes">
		</form>
	</div>
	<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>

</html>

