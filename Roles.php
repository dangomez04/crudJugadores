<?php 
require("CrudRoles.php");
$database = new Roles();
$roles = $database->showRoles();


if(isset($_POST["enviarRol"])){

    $rol = $_POST["rolIntro"];

    $data =[$rol];
    $database->addRol($data);
    header("location:Roles.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="css/tablas.css">
</head>
<body>
    <?php include("menu.php");?>
    <br></br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <h2>Crear Rol</h2>
    Rol:  <input type="text" name="rolIntro" id="">
    <br><br><input type="submit" value="Enviar" name="enviarRol">
    </form>
    <table>
    <tr id="cabecera">
        <td>id</td>
        <td>rol</td>
        <td></td>
        <td></td>

    </tr>
    <?php foreach ($roles as $rol) {

    ?>

    <tr>
        <td><?php echo $rol[0];?></td>
        <td><?php echo $rol[1];?></td>
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>