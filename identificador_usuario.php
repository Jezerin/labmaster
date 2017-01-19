<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";
echo"<script type=text/javascript src=ejemplo_basico_xmlhttprequest_post.js></script>";

	echo"<fieldset id=form>";
			echo"<legend>Informacion del Usuario</legend>";
				echo"<ol>
						<li><label>Nombre:  </label>"; echo $_SESSION['nombre']; echo"  "; echo $_SESSION['apellido']; echo"</li>";
				echo"	<li><label>Rol en Sistema:  </label>"; 
				
				if($_SESSION['rol']==1)
				{
					echo"Administrador de Sistema</li>";
				}
				else
				{
					echo"Usuario Comun";
				}
		
	echo"</fieldset>";
	
	echo"<div id=demo style=width:600px;>
				<div id=demoArr>Lab Master te dice:</div>
				<br>
				<div id=demoAba>
					<button type=button onclick=traerDatos('ip')>Traer IP</button>
					<button type=button onclick=traerDatos('time')>Traer hora del Server</button>
				</div>
			</div>";
	
	mysql_close($link);
	
?>