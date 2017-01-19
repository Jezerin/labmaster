<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_equipo		=$_POST['id_equipo'];

	$query	=mysql_query("SELECT*FROM equipos WHERE ID_EQUIPO=$id_equipo");
	
	if($row=mysql_fetch_array($query))
	{

		echo"<form action=modifica_e.php method=post>";

		echo"<table class=usuarios summary=Equipos del Sistema cellspacing=0>
			<caption>Confirmacion</caption>
			<tbody>
			<tr class=cabeceras>
				<th>Nombre del Equipo</th>
				<th>Caracteristicas</th>
				<th>Tipo</th>
			</tr>
			<tr class=registros>";
			
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
			echo"<input type=text style=visibility:hidden name=id_equipo value=$row[0]>";
			
			echo"<fieldset id=form>";
				echo"<legend>Modificacion de Equipo</legend>";
					echo"<ol>
							<li><label>Equipo:</label><input type=text name=nombre_eq></li>";
				
					echo"<li><label>Caracteristicas:</label><textarea name=caracteristicas cols=50 rows=5 name=reporte></textarea></li>";
						
					echo"<li><label>Clasificacion:</label><select name=tipo></li>";
														echo"<option value=1>Computo</option>";
														echo"<option value=2>Accesorio</option>";
														echo"<option value=3>Periferico</option>";
					echo"</select>";
				
				echo"</ul>";
			
					echo"<p align=center><input type=submit value=Modificar name=submit class=btn/>";
			
		echo"</fieldset>";
			
		echo"</form>";
	}

	mysql_close($link);
	
?>