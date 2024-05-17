<?php
require_once '../controllers/DBController.php';
require_once '../models/feedback.php';
require_once '../models/user.php';


class feedbackController{
  protected $db;
    public function writeFeedback (Feedback $feedback){
    $user=new User;
    $this->db=new DBController ;
    
    if($this->db->openConc()){
    $user_query = "SELECT user_id FROM users WHERE email = '{$user->getEmail()}'";
//     $user_result = mysqli_query($conn, $user_query);

//      if (mysqli_num_rows($user_result) > 0) {
//   // User record was found
//       $user_row = mysqli_fetch_assoc($user_result);
      // $user_id = $user_row['user_id'];
   //$this->db->real_escape_string($this->email);
   
   $query = "INSERT INTO `feedback` (email, overall_experience, comment, created_at, user_id) VALUES (
    '" . $feedback->getEmail() . "',
    '" . $feedback->getOverallExperience() . "',
    '" . $feedback->getComment() . "',
    '" . $feedback->getCreatedAt() . "',
    (SELECT `user_id` FROM `users` WHERE `email`='" . $feedback->getEmail() . "')
)";


    $result = $this->db->insert($query);
    if($result!=false){
       //session_start();
      // $_SESSION["user_id"] = $result;
        //$_SESSION["name"] = $user->name;
      
        $this->db->closeConc() ;
        return true ;
    
    
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