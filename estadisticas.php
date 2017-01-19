<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=usuario.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Consulta de Estadisticas</legend>";
				echo"<ol>
						<li><a href=estadisticas_e.php>Por Equipo</a></li>
						<li><a href=estadisticas_f.php>Por Fecha</a></li>
						<li><a href=estadisticas_u.php>Por Usuario</a></li>";
			
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>