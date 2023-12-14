<?php 
require_once("Connection.php");

class Roles{

    public function showRoles(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM roles";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }

    public function addRol($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO roles (rol) VALUES ('$data[0]')";
        $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);
    }



}


?> 