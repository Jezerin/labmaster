<?php

include("sesion.php");
include("conexion.php");

$fecha_sistema	=date("Y-m-d H:i:s");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM reservaciones");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Reservaciones cellspacing=0>
		<caption>Reservaciones Actuales</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Fecha</th>
			<th>Nombre del equipo</th>
			<th>Comentarios</th>
			<th>Usuario</th>
		</tr>
		<tr class=registros>";
		
		if($row[1]<$fecha_sistema)
		{
			mysql_query("UPDATE reservaciones SET ESTATUS='2' WHERE ID_EQUIPO=$row[0]",$link);
		}
	
		do
		{

			$query_u=mysql_query("SELECT USUARIO FROM usuarios WHERE ID_USUARIO=$row[4]",$link);
			$temp=mysql_fetch_assoc($query_u);
		
			if($row[5]==1)
			{			
				echo"<td>$row[1]</td><td>$row[3]</td><td>$row[2]</td><td>";echo$temp['USUARIO'];echo"</td>";
				echo"</tr>";
			}
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