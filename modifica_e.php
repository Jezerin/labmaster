<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$id_equipo		=$_POST['id_equipo'];
$nombre_eq		=$_POST['nombre_eq'];
$caracteristicas=$_POST['caracteristicas'];
$tipo			=$_POST['tipo'];

	//valida que los campos no esten vacios
	if(empty($nombre_eq) || empty($caracteristicas) || empty($tipo))
	{ 
		echo"Alguno de los datos no ha sido introducido, por favor llene todos los campos para el registro<a href=registra_equipo.php>Reintentar</a>";
    }

		//arreglo de expresiones y caracteres no permitidos
		$sen=array("SCRIPT"," AND ", "+" ,"SELECT", "UPDATE", "INSERT", "DELETE", "<>", "*","DROP","WHERE","\'"," OR ","ALERT");
		
		$num1=0;
		$num2=0;
		
		$nombre_eq=mysql_escape_string($nombre_eq);
		$cahe_nombre_eq=str_replace($sen,"",strtoupper($nombre_eq),$num1);
		
		if($num1>=1)
		{
			echo"Ha introducido caracteres invalidos en el campo Equipo <br> <a href=registra_equipo.php>Reintentar</a>";
		}
		
		$caracteristicas=mysql_escape_string($caracteristicas);
		$cahe_caracteristicas=str_replace($sen,"",strtoupper($caracteristicas),$num2);
		
		if($num2>=1)
		{
			echo"Ha introducido caracteres invalidos en el campo Caracteristicas <br> <a href=registra_equipo.php>Reintentar</a>";
		}
		
	if($num1==0 && $num2==0)
	{
		mysql_query("UPDATE equipos SET NOMBRE_EQ='$nombre_eq', CARACTERISTICAS='$caracteristicas', TIPO='$tipo' WHERE ID_EQUIPO=$id_equipo",$link);
		echo"Modificacion Exitosa<br>";
	}
	else
	{
		echo"Alguno de los datos no ha sido introducido correctamente, por favor llene todos los campos con datos verdaderos <br> <a href=registra_usuario.php>Reintentar</a>";
	}	

	mysql_close($link);
	
?>