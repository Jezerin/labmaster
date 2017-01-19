<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$horas		=$_POST['horas'];



	//valida que los campos no esten vacios
	if(empty($horas))
	{ 
		echo"No ha seleccionado ninguna hora <a href=registra_hora.php>Reintentar</a>";
    }
	else
	{
		for($i=0;$i<sizeof($horas);$i++)
		{
			$query	=mysql_query("SELECT*FROM horas WHERE HORA='$horas[$i]'");

			if($row=mysql_fetch_array($query))
			{
				echo"No puede registrar una hora dos veces";
			}
			else
			{
				mysql_query("INSERT INTO horas (HORA) VALUES ('$horas[$i]')",$link);
			}
		}
		
	}	

	mysql_close($link);
	
?>