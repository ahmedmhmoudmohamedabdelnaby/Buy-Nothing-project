<?php
include_once 'C:\xampp\htdocs\project8\models\user.php';
include_once 'C:\xampp\htdocs\project8\controllers\DBController.php';
include_once 'C:\xampp\htdocs\project8\controllers\AuthController.php';

if(!isset($_SESSION["user_id"])){
    session_start();
}
 $errMsg="";
// if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['password']) && isset($_POST['phone_number'])&&isset($_POST['location']) && isset($_POST['image'])) 
// {
//     if(!empty($_POST['name']) && !empty($_POST['email'])&&!empty($_POST['password']) && !empty($_POST['phone_number'])&&!empty($_POST['location']) && !empty($_POST['image']))
//     {
   if(isset($_POST['submit'])){

      echo"s";
   $user = new User;
   $Auth = new AuthController;
   echo"s";
     $user->setName($_POST['name']);
     $user->setEmail($_POST['email']);
     $user->setPassword(md5($_POST['password']));
     $user->setPhoneNumber($_POST['phone_number']);
     $user->setLocation($_POST['location']);
   // $user->image=$_POST['image'];
     $cpass =  md5($_POST['cpassword']);

         if( $user->getPassword() != $cpass){
             $message[] = 'confirm password not matched!';
          }

         else{
                ($Auth->register($user));
             }
   }
   //  else{
     
    //}
     //$cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

         // if( $user->password != $cpass){
             // $message[] = 'confirm password not matched!';
          //}
    
// else{
//     $errMsg="please fill all fields" ;


// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <input type="location" name="location" placeholder="location" class="box" required>
      <input type="phone" name="phone_number" placeholder="phone" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="loginhtml.php">login now</a></p>
   </form>

</div>

</body>
</html>