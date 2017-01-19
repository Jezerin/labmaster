<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=usuario.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Registro de Usuario</legend>";
				echo"<ol>
						<li><label>Nombre:</label><input type=text name=nombre_u></li>";
			
				echo"<li><label>Apellido:</label><input type=text name=apellido_u></li>";
					
				echo"<li><label>E-mail:</label><input type=text name=email_u></li>";
				
				echo"<li><label>Usuario:</label><input type=text name=usuario></li>";
				
				echo"<li><label>Password:</label><input type=password name=password></li>";
				
				echo"<li><label>Confirmacion:</label><input type=password name=password2></li>";
				
				echo"<li><label>Rol:</label><select name=rol></li>";
													echo"<option value=1>Administrador</option>";
													echo"<option value=2>Usuario</option>";
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Registrar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>