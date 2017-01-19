<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$hora			=$_POST['hora'];
$fecha			=$_POST['fecha'];
$comentario		=$_POST['comentario'];
$equipo			=$_POST['equipo'];
$id				=$_SESSION['ID'];
$fecha_sistema	=date("Y-m-d H:i:s");

$fecha.=" ";
$fecha.=$hora;
$emailusuario=$_SESSION['email'];

//echo"<br>$fecha";

	if(empty($comentario) || empty($fecha))
	{
		echo"Por favor llene todos los campos para realizar su reservacion <a href=realiza_reservacion.php>Reintentar</a>";
	}
	else
	{
		if($fecha<=$fecha_sistema)
		{
			echo"No puede reservar en una fecha anterior o igual a la hoy <a href=realiza_reservacion.php>Reintentar</a>";
		}
		else
		{
			$query=mysql_query("SELECT*FROM reservaciones WHERE FECHA='$fecha' AND ID_EQUIPO='$equipo' AND ESTATUS=1");
			
			if($row=mysql_fetch_array($query))
			{
				echo"EL laboratorio ya ha sido reservado, intente reservando con fecha, hora o equipo diferente <a href=realiza_reservacion.php>Reintentar</a>";
			}
			else
			{
		
				//arreglo de expresiones y caracteres no permitidos
				$sen=array("SCRIPT"," AND ", "+" ,"SELECT", "UPDATE", "INSERT", "DELETE", "<>", "*","DROP","WHERE","\'"," OR ","ALERT");
			
				$num1=0;
			
				$comentario=mysql_escape_string($comentario);
				$cache_comentario=str_replace($sen,"",strtoupper($comentario),$num1);
			
				if($num1>=1)
				{
					echo"Ha introducido caracteres invalidos en el campo Comentarios <br> <a href=realiza_reservacion.php>Reintentar</a>";
				}
				else
				{
					mysql_query("INSERT INTO reservaciones (FECHA, COMENTARIO, ID_EQUIPO, ID_USUARIO, ESTATUS) VALUES ('$fecha','$comentario','$equipo','$id','1')",$link);
					
					$texto="Usted tiene una reservacion correspondiente a $fecha, ha utilizado LabMaster";
					
					$headers = "MIME-Version: 1.0\r\n"; 
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					$headers .= "From: Administrador <jezer.eduardo.mr@gmail.com>\r\n";
					mail($emailusuario,"Reservacion",$texto ,$headers);
					echo"Reservacion realizada con exito";
					
				}
			}
		}
	}
	
	mysql_close($link);
	
?>