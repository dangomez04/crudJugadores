<?php 
require("CrudUsuarios.php");
$database = new Usuarios();
$usuarios = $database->showUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/tablas.css">
</head>
<body>
<?php 
require("menu.php");
?>
<br></br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <h2>Crear Usuario</h2>
    Nombre:  <input type="text" name="rolIntro" id=""><br><br>
    Password: <input type="password" name="passwordIntro"><br><br>
    Rol: <select>
        <?php foreach ($usuarios as $user) {
        ?>
        <option value="<?php echo $user[3];?>"><?php echo $user[4];?></option>
        <?php }?>
    </select><br><br>
    <input type="submit" value="Enviar" name="enviarUsuario">
    </form>
<table>
    <tr id="cabecera">
        <td>id</td>
        <td>nombre</td>
        <td>password</td>
        <td>rol</td>
        <td></td>
        <td></td>

    </tr>
    <?php foreach ($usuarios as $user) {

    ?>

    <tr>
        <td><?php echo $user[0];?></td>
        <td><?php echo $user[1];?></td>
        <td><?php echo $user[2];?></td>
        <td><?php echo $user[4];?></td>
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>



    </tr>
    <?php }?>

</table>

</body>
</html>