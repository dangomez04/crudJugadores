<?php 
require("CheckSession.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">

</head>
<body>
<p>Bienvenido <?php echo $_SESSION["usuario"];?></p>

<div id="menu">

    <a href="Usuarios.php">Usuarios</a>
    <a href="Jugadores.php">Jugadores</a>
    <a href="Ligas.php">Ligas</a>
    <a href="index.php?cerrarSesion">Cerrar Sesión</a>
</div>
</body>
</html>