<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_hora		=$_POST['id_hora'];

	mysql_query("DELETE FROM horas WHERE ID_HORA=$id_hora",$link);
	
	echo"Hora eliminada del Sistema";

	mysql_close($link);
	
?>