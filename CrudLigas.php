<?php 
require_once("Connection.php");

class Ligas{

    public function showLigas(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM liga";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }

    public function addLigas($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO liga (nombreLiga, imagenLiga) VALUES ('$data[0]', '$data[1]')";
        $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);
    }

    public function deleteLiga($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "DELETE FROM liga WHERE idLiga = $data[0]";
        $mySQL->query($sql);
        $sqlConnection->closeConnection($mySQL);
    }

}


?> 