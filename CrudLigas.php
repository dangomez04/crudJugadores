<?php 
require("Connection.php");

class Ligas{

    public function showLigas(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM liga";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }



}


?> 