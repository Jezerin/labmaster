<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=filtro_f.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Estadisticas por Fecha</legend>";
				echo"<ol>";
				
				echo"<li><label>Rol:</label><select name=fecha></li>";
								
								$query=mysql_query("SELECT FECHA FROM reservaciones",$link);
			
										while($temp=mysql_fetch_assoc($query))
										{
											echo"<option value='".$temp['FECHA']."'>".$temp['FECHA']."</option>";
										}
								
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Consultar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>