<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_reservacion		=$_POST['id_reservacion'];

	mysql_query("UPDATE reservaciones SET ESTATUS='3' WHERE ID_RESERVACION=$id_reservacion",$link);
	
	mysql_close($link);
	
?>