<?php
class Chat {
    private $chat_id;
    private $sender_id;
    private $receiver_id;
    private $message;
    private $created_at;
    private $email ;

    public function getChatId() {
        return $this->chat_id;
    }

    public function setChatId($chat_id) {
        $this->chat_id = $chat_id;
    }

    public function getSenderId() {
        return $this->sender_id;
    }

    public function setSenderId($sender_id) {
        $this->sender_id = $sender_id;
    }

    public function getReceiverId() {
        return $this->receiver_id;
    }

    public function setReceiverId($receiver_id) {
        $this->receiver_id = $receiver_id;
    }
    public function getEmail() {
        return $this->email;
      }
    
      public function setEmail($email) {
        $this->email = $email;
      }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $created_at = date('Y-m-d H:i:s');
      $this->created_at = $created_at;
        
    }
}




















?>