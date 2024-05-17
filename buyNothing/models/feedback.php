<?php
class feedback {
    private $email;
    private $overall_experience;
    private $comment;
    private $created_at;
    private $user_id;
    private $feedback_id;
  
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail($email) {
      $this->email = $email;
    }
  
    public function getOverallExperience() {
      return $this->overall_experience;
    }
  
    public function setOverallExperience($overall_experience) {
      $this->overall_experience = $overall_experience;
    }
  
    public function getComment() {
      return $this->comment;
    }
  
    public function setComment($comment) {
      $this->comment = $comment;
    }
  
    public function getCreatedAt() {
      return $this->created_at;
    }
  
    public function setCreatedAt($created_at) {
      $this->created_at = $created_at;
    }
  
    public function getUserId() {
      return $this->user_id;
    }
  
    public function setUserId($user_id) {
      $this->user_id = $user_id;
    }
  }
?>