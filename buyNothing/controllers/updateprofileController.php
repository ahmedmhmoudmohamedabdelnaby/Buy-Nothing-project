<?php
require_once '../models/user.php';
require_once '../controllers/DBController.php';

class update_profileController{
    public $db;
public function updateProfile(User $user){
    session_start();
   $this->db=new DBcontroller;
    if ($this->db->openConc()){
      
       $x=$user->getName();
       $y=$user->getEmail();
       $z=$user->getPassword();
       $m=$user->getPhoneNumber();
       $u=$user->getLocation();
       //$n=$user->user_id;
     // echo $n;
   // session_start();
   $user_id = $_SESSION['user_id'];
    //echo $user_id;
    $query = "UPDATE `users` SET `name`='$x',`email`='$y',`password`='$z'
    ,`phone_number`='$m',`location`='$u' 
    WHERE `user_id`=$user_id";


   $result = $this->db->update($query) ;
   
   if($result!=false){
    $this->db->closeConc();
    //return true ;
   }
   else {
    $_SESSION["errMsg"]="something wrong" ;
    $this->db->closeConc() ;
    return false ;
}

}
   else {
    echo "error in database connection" ;
    return false ;

}
}
}
?>