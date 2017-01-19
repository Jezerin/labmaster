<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_usuario		=$_POST['id_usuario'];

	mysql_query("DELETE FROM usuarios WHERE ID_USUARIO=$id_usuario",$link);
	
	echo"Usuario eliminado del sistema";

	mysql_close($link);
	
?>