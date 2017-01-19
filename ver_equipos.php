<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM equipos");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Equipos del Sistema cellspacing=0>
		<caption>Relacion de Equipos en el Sistema</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Nombre del Equipo</th>
			<th>Caracteristicas</th>
			<th>Tipo</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
		<tr class=registros>";
	
		do
		{	
			if($row[3]==1)
			{
				echo"<td>$row[1]</td><td>$row[2]</td><td>Computo</td>";
			}
			if($row[3]==2)
			{
				echo"<td>$row[1]</td><td>$row[2]</td><td>Accesorio</td>";
			}
			if($row[3]==3)
			{
				echo"<td>$row[1]</td><td>$row[2]</td><td>Periferico</td>";
			}
			//se declara formulario para modificar equipo
			echo"<form action=modifica_equipo.php method=post>";
			echo"<input type=text style=visibility:hidden name=id_equipo value=$row[0]>";
			echo"<input type=text style=visibility:hidden name=nombre_e value=$row[1]>";
			echo"<input type=text style=visibility:hidden name=caracteristicas value=$row[2]>";				
			echo"<input type=text style=visibility:hidden name=tipo value=$row[3]>";
			echo"<td><input type=submit value=Modificar></td></form>";
			//se declara formulario para eliminar equipo
			echo"<form action=elimina_equipo.php method=post>";
			echo"<input type=text style=visibility:hidden name=id_equipo value=$row[0]>";
			echo"<input type=text style=visibility:hidden name=nombre_e value=$row[1]>";
			echo"<input type=text style=visibility:hidden name=caracteristicas value=$row[2]>";				
			echo"<input type=text style=visibility:hidden name=tipo value=$row[3]>";
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