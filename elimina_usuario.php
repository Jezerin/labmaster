<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id			=$_POST['id_usuario'];
$nombre		=$_POST['nombre_u'];
$apellido	=$_POST['apellido_u'];
$email		=$_POST['email_u'];
$usuario	=$_POST['usuario'];
$password	=$_POST['password'];

	echo"<form action=elimina_u.php method=post>";

	echo"<table class=usuarios summary=Confirmar Modificacion cellspacing=0>
		<caption>Confirmacion</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>E-mail</th>
			<th>Usuario</th>
			<th>Password</th>
			<th>Eliminar</th>
		</tr>
		<tr class=registros>";
		
		echo"<td>$nombre</td><td>$apellido</td><td>$email</td><td>$usuario</td><td>$password</td>";
		echo"<input type=text style=visibility:hidden name=id_usuario value=$id>";
		echo"<td><input type=submit value=Eliminar></td></form>";

	mysql_close($link);
	
?>