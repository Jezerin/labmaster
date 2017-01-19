<?php

include("sesion.php");
include("conexion.php");

$usuario		 =$_POST['usuario'];

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM reservaciones WHERE ID_USUARIO='$usuario'");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Reservaciones cellspacing=0>
		<caption>Estadisticas de Usuario</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Fecha</th>
			<th>Nombre del equipo</th>
			<th>Comentarios</th>
		</tr>
		<tr class=registros>";
	
		do
		{				
			echo"<td>$row[1]</td><td>$row[3]</td><td>$row[2]</td>";
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