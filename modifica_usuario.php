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

	echo"<form action=modifica_u.php method=post>";

	echo"<table class=usuarios summary=Confirmar Modificacion cellspacing=0>
		<caption>Confirmacion</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>E-mail</th>
			<th>Usuario</th>
			<th>Password</th>
		</tr>
		<tr class=registros>";
		
		echo"<td>$nombre</td><td>$apellido</td><td>$email</td><td>$usuario</td><td>$password</td>";
		echo"<input type=text style=visibility:hidden name=id_usuario value=$id>";
		
		echo"<fieldset id=form1>";
			echo"<legend>Modificacion de Usuario</legend>";
				echo"<ol>
						<li><label>Nombre:</label><input type=text name=nombre_u></li>";
			
				echo"<li><label>Apellido:</label><input type=text name=apellido_u></li>";
					
				echo"<li><label>E-mail:</label><input type=text name=email_u></li>";
				
				echo"<li><label>Usuario:</label><input type=text name=usuario></li>";
				
				echo"<li><label>Password:</label><input type=password name=password></li>";
				
				echo"<li><label>Confirmacion:</label><input type=password name=password2></li>";
				
				echo"<li><label>Rol:</label><select name=rol></li>";
													echo"<option value=1>Administrador</option>";
													echo"<option value=2>Usuario</option>";
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Modificar name=submit class=btn/>";
		
		echo"</fieldset>";
		
	echo"</form>";

	mysql_close($link);
	
?>