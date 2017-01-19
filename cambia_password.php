<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";
	
	echo"<form action=password.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Cambio de Password</legend>";
				echo"<ol>
				
				   	<li><label>Password Actual:</label><input type=password name=actual></li>";
			
				echo"<li><label>Nuevo Password:</label><input type=password name=nueva></li>";
					
				echo"<li><label>Confirmar:</label><input type=password name=confirmar></li>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Cambiar name=submit class=btn/>";
		
		echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);
	
?>