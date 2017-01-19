<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";
	
$actual			=$_POST['actual'];
$nueva			=$_POST['nueva'];
$confirmar		=$_POST['confirmar'];
$id				=$_SESSION['ID'];

	if(empty($actual) || empty($nueva) || empty($confirmar))
	{ 
		echo"Alguno de los datos no ha sido introducido, por favor llene todos los campos para la modificacion <a href=cambia_contraseña_u.php>Reintentar</a>";
    }

		$query	=mysql_query("SELECT PASSWORD FROM usuarios WHERE PASSWORD=$actual");
	
	if($row=mysql_fetch_array($query))
	{
	
		if($nueva==$confirmar)
		{
			//arreglo de expresiones y caracteres no permitidos
			$sen=array("SCRIPT"," AND ", "+" ,"SELECT", "UPDATE", "INSERT", "DELETE", "<>", "*","DROP","WHERE","\'"," OR ","ALERT");
			
			$num1=0;
			$num2=0;
			
			$nueva=mysql_escape_string($nueva);
			$cahe_nueva=str_replace($sen,"",strtoupper($nueva),$num1);
			
			if($num1>=1)
			{
				echo"Ha introducido caracteres invalidos Nuevo Password <a href=cambia_contraseña_u.php>Reintentar</a>";
			}
			
			$confirmar=mysql_escape_string($confirmar);
			$cahe_confirmar=str_replace($sen,"",strtoupper($confirmar),$num2);
			
			if($num2>=1)
			{
				echo"Ha introducido caracteres invalidos en Confirmacion <a href=cambia_contraseña_u.php>Reintentar</a>";
			}
			
			mysql_query("UPDATE usuarios SET PASSWORD='$nueva' WHERE ID_USUARIO=$id",$link);
			echo"Cambio de Password Exitoso <br>";
		}
		else
		{
			echo"Las contraseñas no coinciden <a href=cambia_contraseña_u.php>Reintentar</a>";
		}
	}
	else
	{
		echo"No hay coincidencia de password actual";
	}
	
	
	mysql_close($link);
	
?>