<?php

include("sesion.php");
include("conexion.php");

$fecha		 =$_POST['fecha'];

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM reservaciones WHERE FECHA='$fecha'");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Reservaciones cellspacing=0>
		<caption>Estadisticas de $fecha </caption>
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