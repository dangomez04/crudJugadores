<?php 
require_once("Connection.php");

class Usuarios{

    public function showUsuario(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT usuarios.*, roles.rol FROM usuarios JOIN roles ON usuarios.id_rol=roles.id";
        $result = $mySQL->query($sql);

        return $result->fetch_all(MYSQLI_BOTH);
        //print_r($result->fetch_array());

    }

    public function addUsuario($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO usuarios (nombreUsuario, password, id_rol) VALUES ('$data[0]', '$data[1]', '$data[2]')";
        $mySQL->query($sql);
        $sqlConnection->closeConnection($mySQL);
    }



}


?> 