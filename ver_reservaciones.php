<?php

include("sesion.php");
include("conexion.php");

$id				=$_SESSION['ID'];
$fecha_sistema	=date("Y-m-d H:i:s");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$query	=mysql_query("SELECT*FROM reservaciones WHERE ID_USUARIO=$id");

	if($row=mysql_fetch_array($query))
	{	
	
		echo"<table class=usuarios summary=Reservaciones cellspacing=0>
		<caption>Reservaciones Actuales</caption>
		<tbody>
		<tr class=cabeceras>
			<th>Fecha</th>
			<th>Nombre del equipo</th>
			<th>Comentarios</th>
		</tr>
		<tr class=registros>";
		
		if($row[1]<$fecha_sistema)
		{
			mysql_query("UPDATE reservaciones SET ESTATUS='2' WHERE ID_EQUIPO=$row[3] AND ID_USUARIO=$id AND ESTATUS!='3'",$link);
		}
	
		do
		{	
			if($row[5]==1)
			{			
				echo"<td>$row[1]</td><td>$row[3]</td><td>$row[2]</td>";
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