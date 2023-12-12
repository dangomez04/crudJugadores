<?php 
require("Connection.php");

class Usuarios{

    public function showUsuario(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM usuarios";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }



}


?> 