<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=filtro_u.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Estadisticas por Usuario</legend>";
				echo"<ol>";
				
				echo"<li><label>Rol:</label><select name=usuario></li>";
								
								$query=mysql_query("SELECT ID_USUARIO, USUARIO FROM usuarios",$link);
			
										while($temp=mysql_fetch_assoc($query))
										{
											echo"<option value='".$temp['ID_USUARIO']."'>".$temp['USUARIO']."</option>";
										}
								
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Consultar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>