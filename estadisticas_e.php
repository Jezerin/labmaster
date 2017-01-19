<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=filtro_e.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Estadisticas por Equipo</legend>";
				echo"<ol>";
				
				echo"<li><label>Rol:</label><select name=equipo></li>";
								
								$query=mysql_query("SELECT ID_EQUIPO, NOMBRE_EQ FROM equipos",$link);
			
										while($temp=mysql_fetch_assoc($query))
										{
											echo"<option value='".$temp['NOMBRE_EQ']."'>".$temp['NOMBRE_EQ']."</option>";
										}
								
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Consultar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>