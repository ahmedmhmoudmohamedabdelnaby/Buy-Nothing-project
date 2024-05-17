<?php
class group {
  private $group_name;
  private $location;
  private $num_members;
  private $created_at;
  private $owner;
  private $group_id;


  public function getGroupName() {
    return $this->group_name;
  }

  public function setGroupName($group_name) {
    $this->group_name = $group_name;
  }

  public function getLocation() {
    return $this->location;
  }

  public function setLocation($location) {
    $this->location = $location;
  }

  public function getNumMembers() {
    return $this->num_members;
  }

  public function setNumMembers($num_members) {
    $this->num_members = $num_members;
  }

  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  public function getOwner() {
    return $this->owner;
  }

  public function setOwner($owner) {
    $this->owner = $owner;
  }

  public function setGroupId($group_id) {
    $this->group_id = $group_id;
  }

  public function getGroupId() {
    return $this->group_id;
  }
}

?>