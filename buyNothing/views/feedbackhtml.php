<!DOCTYPE html>
<html>
  <head>
    <title>Customer Feedback Form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      font-weight: 400;
      }
      h4 {
      margin: 15px 0 4px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input {
      width: calc(100% - 10px);
      padding: 7px;
      border: 1px solid #ccc;
      border-radius: 3px;
      vertical-align: middle;
      }
      .email {
      display: block;
      width: 45%;
      }
      input:hover, textarea:hover {
      outline: none;
      border: 1px solid #095484;
      }
      th, td {
      width: 15%;
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col {
      width: 16%;
      text-align: left;
      }
      table {
      width: 100%;
      }
      textarea {
      width: calc(100% - 6px);
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      th, td {
      word-break: keep-all;
      }
      input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}
    label {
			display: block;
			margin-bottom: 5px;
		}
      }
    </style>
  </head>
  <body>
  <?php


/* include_once 'C:\xampp\htdocs\test2\models\User.php';
include_once 'C:\xampp\htdocs\test2\controllers\config.php';
include_once 'C:\xampp\htdocs\test2\controllers\feedbackController.php'; */

require_once '../controllers/DBController.php';
require_once '../models/user.php';
require_once '../controllers/feedbackController.php';
 if(isset($_POST['submit'])){
  if(!isset($_SESSION["feedback_id"])){
    session_start();
    session_destroy();
  }
 $user = new User;
 $Feedback = new feedbackController;
 $feedback=new Feedback;
   $feedback->setOverallExperience($_POST['overall_experience']);
   $feedback->setEmail($_POST['email']);
   $feedback->setComment($_POST['comment']);
   $created_at = date('Y-m-d H:i:s');
   $feedback->setCreatedAt($created_at);

  

 if(isset($_POST['submit']) && $_POST['submit'] == 'Submit Feedback'){
  $Feedback->writeFeedback($feedback);

  // Redirect to prevent form resubmission
  echo "feedback submitted";
  header('Location: feedbackhtml.php');
  exit();
}
          }

// $email = $_POST['email'];
// $overall_experience = $_POST['overall_experience'];
// //$comments = $_POST['comments'];
// $created_at = date('Y-m-d H:i:s');

// // Query the users table to get the user_id corresponding to the user's email
// $user_query = "SELECT user_id FROM users WHERE email = '$email'";
// $user_result = mysqli_query($conn, $user_query);

// if (mysqli_num_rows($user_result) > 0) {
//   // User record was found
//   $user_row = mysqli_fetch_assoc($user_result);
//   $user_id = $user_row['user_id'];}
  
//   // Construct the query to insert a new feedback record
//   $query = "INSERT INTO feedback (user_id,email, overall_experience, created_at) VALUES ('$user_id','$email', '$overall_experience', '$created_at')";

//   // Execute the query
//   if (mysqli_query($conn, $query)) {
//     // Feedback record was successfully inserted
//     echo "Feedback record was successfully inserted.";
//   } else {
//     // Error occurred while inserting feedback record
//     echo "Error occurred while inserting feedback record: " . mysqli_error($conn);
//   }}

  ?> 
       
    <div class="testbox">
      <form action="" method="post" enctype="multipart/form-data">
        <h1>Customer Feedback Form</h1>
        <p>Please take a few minutes to give us feedback about our service by filling in this short Customer Feedback Form. We are conducting this research in order to measure your level of satisfaction with the quality of our service. We thank you for your participation.</p>
        <hr />
        <h3>Overall experience with our service</h3>
         <h4>Rate your overall experience out of 10</h4>
         <textarea name="overall_experience" id="overall_experience" required></textarea>
        <h4>Email</h4>
		    <input type="email" name="email" id="email" required>
        <h4>Comment</h4>
        <small>Only if you want to hear more from us.</small>
        <input type="comment" name="comment" id="comment" >
        <input type="submit" name="submit" value="Submit Feedback">
      </form>
    </div>
    <form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
  </body>
</html>