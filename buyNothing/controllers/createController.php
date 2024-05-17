<?php
require_once '../models/groupcreation.php';
require_once '../controllers/DBController.php';

class createController{
    protected $db;
        public function create(create_group $user) {
            $this->db = new DBController();
            if ($this->db->openConc()) {
                $query = "INSERT INTO `groups` (name, location,num_members) VALUES ( '{$user->getName()}', '{$user->getlocation()}', '{$user->getnum_mambers()}')";
                $result = $this->db->insert($query);
                if ($result != false) {
                    
                    $this->db->closeConc();
                    return true;
                } else {
                    $_SESSION["errMsg"] = "Something went wrong";
                    $this->db->closeConc();
                    return false;
                }
            } else {
                echo "Error in database connection";
                return false;
            }
        }
    }
    

?>