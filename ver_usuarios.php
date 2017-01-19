<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM usuarios");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Usuarios del Sistema cellspacing=0>
		<caption>Relacion de Usuarios en el Sistema</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>E-mail</th>
			<th>Usuario</th>
			<th>Password</th>
			<th>Rol</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
		<tr class=registros>";
	
		do
		{	
			if($row[6]==1)
			{
				echo"<td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>Administrador</td>";
			}
			if($row[6]==2)
			{
				echo"<td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>Usuario</td>";
			}
			//se declara formulario para modificar usuario
			echo"<form action=modifica_usuario.php method=post>";
			echo"<input type=text style=visibility:hidden name=id_usuario value=$row[0]>";
			echo"<input type=text style=visibility:hidden name=nombre_u value=$row[1]>";
			echo"<input type=text style=visibility:hidden name=apellido_u value=$row[2]>";				
			echo"<input type=text style=visibility:hidden name=email_u value=$row[3]>";
			echo"<input type=text style=visibility:hidden name=usuario value=$row[4]>";
			echo"<input type=text style=visibility:hidden name=password value=$row[5]>";
			echo"<td><input type=submit value=Modificar></td></form>";
			//se declara formulario para eliminar usuario
			echo"<form action=elimina_usuario.php method=post>";
			echo"<input type=text style=visibility:hidden name=id_usuario value=$row[0]>";
			echo"<input type=text style=visibility:hidden name=nombre_u value=$row[1]>";
			echo"<input type=text style=visibility:hidden name=apellido_u value=$row[2]>";				
			echo"<input type=text style=visibility:hidden name=email_u value=$row[3]>";
			echo"<input type=text style=visibility:hidden name=usuario value=$row[4]>";
			echo"<input type=text style=visibility:hidden name=password value=$row[5]>";
			echo"<td><input type=submit value=Eliminar></td></form>";
			echo"</tr>";
			
		}
		while ($row=mysql_fetch_array($query));
		echo"</table>";
	}
	else
	{
		echo"No hay datos para mostrar";
	}

	mysql_close($link);
	
?>