  <?php

  require_once('DBController.php');
//require_once '../controllers/DBController.php';
require_once '../../models/user.php';
require_once '../../models/admin.php';

 class UserController {
  protected $db;
  
    public function deleteAccount(User $user, admin $admin) {
      $this->db = new DBController;
  
      if ($this->db->openConc()) {
        // Check if the admin is authorized to delete the user's account
        if ($admin->getEmail() === "admin11@gmail.com" && $admin->getPassword() === "12345") {
          $email = $user->getEmail();
          $query = "DELETE FROM users WHERE email = '$email'";
          $result = $this->db->delete($query);
  
          if (!$result) {
            echo "Error deleting user account";
            return false;
          } else {
            echo "User account deleted successfully";
            return true;
          }
        } else {
          echo "You are not authorized to delete this user account";
          return false;
        }
      } else {
        echo "Error in database connection";
        return false;
      }
    }
  }

 
?>   