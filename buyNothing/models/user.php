<?php

class User{
    private $user_id;
  private $name;
  private $email;
  private $password;
  private $phone_number;
  private $location;
  private $image;
  private $group_id;

  public function getUserId() {
    return $this->user_id;
  }

  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPhoneNumber() {
    return $this->phone_number;
  }

  public function setPhoneNumber($phone_number) {
    $this->phone_number = $phone_number;
  }

  public function getLocation() {
    return $this->location;
  }

  public function setLocation($location) {
    $this->location = $location;
  }

  public function getImage() {
    return $this->image;
  }

  public function setImage($image) {
    $this->image = $image;
  }

  public function getGroupId() {
    return $this->group_id;
  }

  public function setGroupId($group_id) {
    $this->group_id = $group_id;
  }  


    }






?>