<?php
session_start();
if (isset($_SESSION['tiempo'])) {

    $inactivo = 600; //10 minutos
    $vida_session = time() - $_SESSION['tiempo'];

    if ($vida_session > $inactivo) {
        session_unset();
        session_destroy();
        //CAMBIA EL LOCATION
        header("Location: index.php?sesionExpirada");
        exit();

    } else {
        $_SESSION['tiempo'] = time();
    }


} else {
    $_SESSION['tiempo'] = time();
}