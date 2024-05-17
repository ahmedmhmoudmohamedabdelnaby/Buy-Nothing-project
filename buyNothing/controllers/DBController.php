<?php
class DBController{
    public $dbHost="localhost:3307";
    public $dbUser="root";
    public $dbName="buynothing";
    public $dbPassword="";
    public $conn;

public function openConc(){
    $this->conn=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
    if($this->conn->connect_error){
        echo"error in connection ";
        return false;
    }
    else{
        return true;
    }
}
public function closeConc(){
    if ($this->conn){
        $this->conn->close();
    }
    else{
        echo 'connection is already closed';
    }

}
public function select ($qry){
    $result=$this->conn->query($qry);
    if(!$result){
        echo "error: ".mysqli_error($this->conn);
        return false ;
    }
    else {
        return  $result->fetch_all(MYSQLI_ASSOC) ;
    }
}



public function insert($qry){
    $result=$this->conn->query($qry);
    if(!$result){
        echo 'error: '.mysqli_error($this->conn);
        return false ;
    }
    else {
        return $this->conn->insert_id ;
    }
}



public function delete ($qry){
    $result=$this->conn->query($qry);
    if(!$result){
        echo 'error: '.mysqli_error($this->conn);
        return false ;
    }
    else {
        return true ;
    }
}

public function update($qry){
    $result = $this->conn->query($qry);
    if(!$result){
        echo 'error: '.mysqli_error($this->conn);
        return false;
    }
    else {
        return $this->conn->affected_rows;
    }
}


//$conn = mysqli_connect('localhost','root','','buynothing') or die('connection failed');
public function getConn() {
    return $this->conn;
  }
}
?>