<?php 
require_once("Connection.php");

class Jugadores{

    public function showJugadores(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT jugadores.*,liga.nombreLiga FROM jugadores JOIN liga ON jugadores.liga=liga.idLiga";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }

    public function addJugadores($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO jugadores (nombre, liga,img) VALUES ('$data[0]', '$data[1]','$data[2]')";
        $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);
    }

    public function deleteJugador($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "DELETE FROM jugadores WHERE id = $data[0]";
        $mySQL->query($sql);
        $sqlConnection->closeConnection($mySQL);
    }





}


?> 