<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_equipo		=$_POST['id_equipo'];

	mysql_query("DELETE FROM equipos WHERE ID_EQUIPO=$id_equipo",$link);
	
	echo"Equipo eliminado del sistema";

	mysql_close($link);
	
?>