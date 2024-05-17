<?php
require_once 'group.php';
class groupslist extends group{
   private $town;
   
  public function setTown($town) {
  $this->town = $town;
  }

  public function getTown() {
    return $this->town;
  }

}




?>