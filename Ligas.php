<?php 
require("CrudLigas.php");
$database = new Ligas();
$ligas = $database->showLigas();

if(isset($_POST["submitLigas"])){
    $nombre = $_POST["nombreLiga"];
  

    $fileName = $_FILES["File"]["name"];
    move_uploaded_file($_FILES["File"]["tmp_name"],
    "img/". $fileName);

    $data = [$nombre,$fileName];
    $database->addLigas($data);
    header("location:Ligas.php");

}

if(isset($_GET["eliminar"])){
$id_liga = $_GET["id_liga"];
$nombre_liga = $_GET["nombreLiga"];
$nombre_imagen = $_GET["nombreImagen"];

$data = [$id_liga];
$database->deleteLiga($data);
unlink("img/$nombre_imagen");

header("location:Ligas.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligas</title>
    <link rel="stylesheet" href="css/tablas.css">
    <script src="funciones.js"></script>
</head>
<body>
    <?php include("menu.php");?>
    <br></br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
    <h2>Crear Ligas</h2>

    Nombre: <input type="text" name="nombreLiga"><br><br>
    Imagen: <input type="text" name="nombreImagen">&nbsp;<input type="file" name="File"><br><br>
    <input type="submit" value="Enviar" name="submitLigas">    
</form>


    <table>
    <tr id="cabecera">
        <td>id</td>
        <td>nombre</td>
        <td>imagen</td>
        <td></td>
        <td></td>

    </tr>
    <?php foreach ($ligas as $liga) {

    ?>

    <tr>
        <td><?php echo $liga[0];?></td>
        <td><?php echo $liga[1];?></td>
        <td><img src="img/<?php echo $liga[2];?>" width="50px"></td>
        <td><a href="#">Editar</a></td>
        <td><a href="#" onclick="eliminarLiga('<?php echo $liga[0];?>','<?php echo $liga[1];?>','<?php echo $liga[2];?>')">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>