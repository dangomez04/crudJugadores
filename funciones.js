function eliminarLiga(idLiga,nombreLiga,nombreImagen){
    if(confirm("Deseas eliminar la liga "+nombreLiga+"?")==true){
        location.href="Ligas.php?id_liga="+idLiga+"&nombreLiga="+nombreLiga+"&nombreImagen="+nombreImagen+"&eliminar";
}
}

function eliminarJugadores(idJugador,nombreJugador,id_liga, imgJugador){
    if(confirm("Deseas eliminar el jugador "+nombreJugador+"?")==true){
        location.href="Jugadores.php?id_jugador="+idJugador+"&nombreJugador="+nombreJugador+"&id_liga="+id_liga+"&imgJugador="+imgJugador+"&eliminar";
}
}