<?php
 require_once '../models/user.php';
 require_once '../controllers/AuthController.php';


 if(isset($_POST['email']) && isset($_POST['password'])){
   if(!empty($_POST['email']) && !empty($_POST['password'])){
    $User = new User;
    
    $Auth = new AuthController;
    $User->setEmail($_POST['email']);
    $User->setPassword($_POST['password']);
   // $User->getEmail() = $_POST['email'];
    //$User->getPassword() = $_POST['password'];
    $result=$Auth->login($User);
    if($result==1){
      header("location:admin/adminhtml.php");
    }
    else if($result==2){
      header("location:index.php");
      
    }
    // $errmsg= "";
    }
    else{
     
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="loginhtml.php" method="POST" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="registhtml.php">register now</a></p>
   </form>

</div>

</body>
</html>