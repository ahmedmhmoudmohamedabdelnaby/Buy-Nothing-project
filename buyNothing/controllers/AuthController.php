<?php
require_once '../models/user.php';
require_once '../controllers/DBController.php';

class AuthController{
    protected $db;
     //1.openconnection

     //2.run query and logic

     //3.close connection


     public function login(User $user){
        $this->db = new DBController;

        if($this->db->openConc()){
            $query = "select * from users where email = '{$user->getEmail()}'";

            $result = $this->db->select($query);
            print_r($result);
            if($user->getEmail() === "admin11@gmail.com" && $user->getPassword() === "12345"){
                echo "You are an admin";
                return 1;
              }
            else if(!$result){
                echo "User not found";
                return false;
            }
           
            else{
                $hashed_pass = md5($user->getPassword());
                if($result[0]["password"]!=$hashed_pass){
                    echo"You have entered wrong email or password";
                    return false;
                }
               else{
                session_start();
                $_SESSION["email"] = $result[0]["email"];
                $_SESSION["password"] = $result[0]["password"];
                $_SESSION["user_id"] = $result[0]["user_id"];
                $_SESSION["phone_number"] = $result[0]["phone_number"];
                $_SESSION["location"] = $result[0]["location"];
                $_SESSION["image"] = $result[0]["image"];
                $_SESSION["group_id"] = $result[0]["group_id"];
               // $_SESSION["user_id"] = $result[0]["user_id"];
                echo "logged in";
                return 2;
               }
            }
        }
        else{
            echo"Error in database connection";
            return false;
        } 

    }

    
    
        public function register(User $user) {
            $this->db = new DBController();
            if ($this->db->openConc()) {
                $query = "INSERT INTO users (name, email, password, image, location, phone_number) VALUES ('{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}', '{$user->getImage()}', '{$user->getLocation()}', '{$user->getPhoneNumber()}')";
                $result = $this->db->insert($query);
                if ($result != false) {
                    //session_start();
                    //$_SESSION["user_id"] = $result;
                    //$_SESSION["name"] = $user->getName();
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