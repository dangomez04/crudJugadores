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
        setcookie("usuario",$usuario,time() + 60);
        setcookie("password",$passz,time() + 60);

        header("location: menu.php ");


    }
}
 }

 if (isset($_GET["cerrarSesion"])){
    session_start();
    session_destroy();
    unset($_SESSION["usuario"]);
    unset($_SESSION["rol"]);
    $noSessionCond = true;

 }

 if(isset($_GET["sinPermisos"])){
    ?>
<h2>No tienes permisos para acceder a este sitio</h2>
<?php }
 




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
<?php if($noSessionCond){?>
<h2>Hasta pronto!</h2>
<?php }?> 
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