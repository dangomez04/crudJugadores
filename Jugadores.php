<?php
require("CrudJugadores.php");
require("CrudLigas.php");
$database = new Jugadores();
$databaseLigas = new Ligas();
$ligas = $databaseLigas->showLigas();
$jugadores = $database->showJugadores();


if(isset($_POST["enviarJugador"])){
    $nombreJugador = $_POST["jugadorIntro"];
    $liga = $_POST["selectedLiga"];

    $fileName = $_FILES["File"]["name"];
    move_uploaded_file($_FILES["File"]["tmp_name"],
    "img/". $fileName);

    $data = [$nombreJugador,$liga,$fileName];
    $database->addJugadores($data);
    header("location:Jugadores.php");

}


if(isset($_GET["eliminar"])){
    $id_jugador = $_GET["id_jugador"];
    $nombre_jugador = $_GET["nombre_jugador"];
    $id_liga = $_GET["id_liga"];
    $img_jugador = $_GET["imgJugador"];
    
    $data = [$id_jugador];
    $database->deleteJugador($data);
    unlink("img/$img_jugador");
    
    header("location:Jugadores.php");
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <link rel="stylesheet" href="css/tablas.css">
    <script src="funciones.js"></script>
</head>
<body>
<?php include("menu.php");?>
<br></br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
    <h2>Crear Jugadores</h2>
    Nombre:  <input type="text" name="jugadorIntro" id=""><br><br>
    Liga: <select name="selectedLiga">
        <?php foreach ($ligas as $liga) {

        ?>
        <option value="<?php echo $liga['idLiga'];?>"><?php echo $liga['nombreLiga'];?></option>
        <?php }?>
    </select><br><br>
    Imagen: <input type="text" name="nombreImagen">&nbsp;<input type="file" name="File"><br><br>
    <input type="submit" value="Enviar" name="enviarJugador">
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
        <td><a href="#" onclick="eliminarJugadores('<?php echo $jugador[0];?>','<?php echo $jugador[1];?>','<?php echo $jugador[2];?>','<?php echo $jugador[3];?>')">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>