<?php

include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=recuperar.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Recuperacion de Password</legend>";
				echo"<ol>
					<li><label>Usuario</label><input type=text name=usuario></li>";
			
				echo"<li><label>e-mail:</label><input type=text name=email></li>";
				echo"<li><a href=login.html>Login</a></li>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Recuperar name=submit class=btn/>";
		
		echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>