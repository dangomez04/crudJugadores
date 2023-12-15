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

    public function showOneRol($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM roles WHERE roles.id = $data[0]";
        $result = $mySQL->query($sql);
        $sqlConnection->closeConnection($mySQL);
        return $result->fetch_array(MYSQLI_BOTH);
    }



    public function addRol($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        //PREPARED STATEMENT
        $stmt = $mySQL->prepare("INSERT INTO roles (rol) VALUES (?)");
        $stmt->bind_param("s",$data[0]);
        try{
            $stmt->execute();
            
        }catch(Exception $e){
            die("No se ha podido insertar el rol");
        }
        $stmt->close();
      
        $sqlConnection->closeConnection($mySQL);
        return true;
    }

    public function updateRol($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "UPDATE roles SET rol = '$data[1]' WHERE id = '$data[0]'";
        $mySQL->query($sql);
        $sqlConnection->closeConnection($mySQL);
        return true;
    }





}


?> 