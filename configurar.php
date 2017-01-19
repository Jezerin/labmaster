<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";
	
	if($_SESSION['rol'] == 1)
	{
	
		echo"<div id=menu>
		
			<ul>
				<li><a href=registra_usuario.php target=cmainFrame>Registrar Usuario</a></li>
				<li><a href=registra_equipo.php target=cmainFrame>Registrar Equipo</a></li>
				<li><a href=registra_hora.php target=cmainFrame>Registrar Horas</a></li>
				<li><a href=ver_usuarios.php target=cmainFrame>Ver Usuarios</a></li>
				<li><a href=ver_equipos.php target=cmainFrame>Ver Equipos</a></li>
				<li><a href=ver_horas.php target=cmainFrame>Ver Horas</a></li>
				<li><a href=estadisticas.php target=cmainFrame>Estadisticas</a></li>
			</ul>
			
		</div>";
	}
	else
	{
		echo"<div id=menu>
		
			<ul>
				<li><a href=cambia_password.php target=cmainFrame>Cambiar Password</a></li>
			</ul>
			
		</div>";
	}
	
	mysql_close($link);
	
?>