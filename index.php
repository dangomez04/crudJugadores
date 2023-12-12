<?php 
require("CrudUsuarios.php");

 $dataBase = new Usuarios();
 $usuarios = $dataBase->showUsuario();

 if(isset($_POST["enviarInicioSesion"])){
$usuario = $_POST["usuarioIntro"];
$password = md5($_POST["passwordIntro"]);

foreach ($usuarios as $usuariobbdd) {

    if($usuario == $usuariobbdd["nombreUsuario"] && $password == $usuariobbdd["password"]){
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $usuariobbdd["rol"];
        header("location: menu.php ");


    }

}



 }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/inicioSesion.css">
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<h1>Iniciar sesión</h1>
<input type="text" name="usuarioIntro" placeholder="Usuario">
<br><br>
<input type="password" name="passwordIntro" placeholder="Contraseña">
<br><br>

<input type="submit" value="Enviar" name="enviarInicioSesion">
</form>
</body>
</html>