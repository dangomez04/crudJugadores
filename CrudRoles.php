<?php 
require("Connection.php");

class Roles{

    public function showRoles(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM roles";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }



}


?> 