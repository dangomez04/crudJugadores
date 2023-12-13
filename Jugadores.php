<?php
require("CrudJugadores.php");
$database = new Jugadores();
$jugadores = $database->showJugadores();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <link rel="stylesheet" href="css/tablas.css">
</head>
<body>
<?php include("menu.php");?>
<br></br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <h2>Crear Jugadores</h2>
    Nombre:  <input type="text" name="rolIntro" id=""><br><br>
    Liga: <select>
        <?php foreach ($jugadores as $jugador) {

        ?>
        <option></option>
        <?php }?>
    </select>
    <input type="submit" value="Enviar" name="enviarRol">
    </form>
    <table>
    <tr id="cabecera">
        <td>id</td>
        <td>nombre</td>
        <td>liga</td>
        <td>imagen</td>
        <td></td>
        <td></td>

    </tr>
    <?php foreach ($jugadores as $jugador) {

    ?>

    <tr>
        <td><?php echo $jugador[0];?></td>
        <td><?php echo $jugador[1];?></td>
        <td><?php echo $jugador[4];?></td>
        <td><img src="img/<?php echo $jugador[3];?>" width="70px"></td>
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>