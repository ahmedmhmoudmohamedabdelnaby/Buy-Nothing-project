<?php

class create_group{
  private $group_ID;
  private $name;
  private $num_mambers;
  private $location;

  public function getgroup_Id() {
    return $this->group_ID;
  }

  public function setgroup_Id($group_ID) {
    $this->$group_ID = $$group_ID;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getnum_mambers() {
    return $this->num_mambers;
  }

  public function setnum_mambers($num_mambers) {
    $this->num_mambers = $num_mambers;
  }

  public function getLocation() {
    return $this->location;
  }

  public function setLocation($location) {
    $this->location = $location;
  }


    }






?>