<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=equipo.php method=post>";

		echo"<fieldset id=form>";
			echo"<legend>Registro de Equipo</legend>";
				echo"<ol>
						<li><label>Equipo:</label><input type=text name=nombre_eq></li>";
			
				echo"<li><label>Caracteristicas:</label><textarea name=caracteristicas cols=50 rows=5 name=reporte></textarea></li>";
					
				echo"<li><label>Clasificacion:</label><select name=tipo></li>";
													echo"<option value=1>Computo</option>";
													echo"<option value=2>Accesorio</option>";
													echo"<option value=3>Periferico</option>";
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Registrar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>