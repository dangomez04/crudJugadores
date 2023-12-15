<?php 
require("CrudRoles.php");
$database = new Roles();
$roles = $database->showRoles();


if(isset($_POST["enviarRol"])){
    if(isset($_POST["id_rolHidden"]) && ($_POST["id_rolHidden"] != "")){
            $idRolToUpdate = $_POST["id_rolHidden"];
            $nombreRol = $_POST["rolIntro"];
            $data = [$idRolToUpdate,$nombreRol];

            $database->updateRol($data);    
                header("location: Roles.php");
            

        } else {

            $rol = $_POST["rolIntro"];

            $data =[$rol];
            if( $database->addRol($data)){
                header("location:Roles.php");

            }else{
                echo "Ha ocurrido un error";
            }
           
        }

  

}

if(isset($_GET["editar"])){
$id_rol = $_GET["id_rol"];
$data = [$id_rol];

$showRolById = $database->showOneRol($data);

$rol= $showRolById[1];
 

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
    Rol:  <input type="text" name="rolIntro" id="" value="<?php echo isset($rol) ? $rol : ""?>">
    <br><br><input type="submit" value="Enviar" name="enviarRol">
    <input type="hidden" name="id_rolHidden" value="<?php echo isset($rol) ? $id_rol : ""?>">
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
        <td><a href="Roles.php?id_rol=<?php echo $rol["id"];?>&editar">Editar</a></td>
        <td><a href="#">Eliminar</a></td>


    </tr>
    <?php }?>

</table>
</body>
</html>