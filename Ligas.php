<?php 
require("CrudLigas.php");
$database = new Ligas();
$ligas = $database->showLigas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligas</title>
    <link rel="stylesheet" href="css/tablas.css">
</head>
<body>
    <?php include("menu.php");?>
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
        <td><a href="#">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>