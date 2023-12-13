<?php 
require("Connection.php");

class Jugadores{

    public function showJugadores(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT jugadores.*,liga.nombreLiga FROM jugadores JOIN liga ON jugadores.liga=liga.idLiga";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }



}


?> 