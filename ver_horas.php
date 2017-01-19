<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM horas");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Horas del Sistema cellspacing=0>
		<caption>Relacion de Horas en el Sistema</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Hora</th>
			<th>Dar de Baja</th>
		</tr>
		<tr class=registros>";
	
		do
		{
			echo"<form action=elimina_hora.php method=post>";
			echo"<input type=text style=visibility:hidden name=id_hora value=$row[0]>";
			echo"<td>$row[1]</td>";
			echo"<td><input type=submit value=Baja></td></form>";
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