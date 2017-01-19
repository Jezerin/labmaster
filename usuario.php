<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$nombre		=$_POST['nombre_u'];
$apellido	=$_POST['apellido_u'];
$email		=$_POST['email_u'];
$usuario	=$_POST['usuario'];
$password	=$_POST['password'];
$password2	=$_POST['password2'];
$rol	=$_POST['rol'];

//declaracion de banderas para validacion
$flag_nombre	=0;
$flag_apellido	=0;
$flag_mail		=0;
$flag_password	=0;

	//valida que los campos no esten vacios
	if(empty($nombre) || empty($apellido) || empty($email) || empty($usuario) || empty($password) || empty($password2))
	{ 
		echo"Alguno de los datos no ha sido introducido, por favor llene todos los campos para el registro<a href=registra_usuario.php>Reintentar</a><br>";
    }
	else
	{
		//validacion del campo de texto nombre
		//if(preg_match('/'$patron'/', $nombre))
		//{
			$flag_nombre=1;
		//}
		//validacion del campo de texto apellido
		//if(eregi("^([a-zA-Z]+)$", $apellido))
		//{
			$flag_apellido=1;
		//}

		//comprueba que la direccion tenga una estructura general valida 
		if((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr_count($email,".")>= 1))
		{ 
			$flag_mail=1;	 
		}
		//valida que las contraseñas sean iguales
		if($password==$password2)
		{ 
			$flag_password=1;
		}
		//se verifican los estados de las flags para proceder con la eliminacion de xodigo malicioso 
		if($flag_nombre==1 && $flag_apellido==1 && $flag_mail==1 && $flag_password==1)
		{
			//arreglo de expresiones y caracteres no permitidos
			$sen=array("SCRIPT"," AND ", "+" ,"SELECT", "UPDATE", "INSERT", "DELETE", "<>", "*","DROP","WHERE","\'"," OR ","ALERT");
			
			$num1=0;
			$num2=0;
			$num3=0;
			$num4=0;
			$num5=0;
			
			$nombre=mysql_escape_string($nombre);
			$cahe_nombre=str_replace($sen,"",strtoupper($nombre),$num1);
			
			if($num1>=1)
			{
				echo"Ha introducido caracteres invalidos en el campo Nombre";
			}
			
			$apellido=mysql_escape_string($apellido);
			$cahe_apellido=str_replace($sen,"",strtoupper($apellido),$num2);
			
			if($num2>=1)
			{
				echo"Ha introducido caracteres invalidos en el campo Apellido";
			}
			
			$email=mysql_escape_string($email);
			$cahe_email=str_replace($sen,"",strtoupper($email),$num3);
			
			if($num3>=1)
			{
				echo"Ha introducido caracteres invalidos en el campo E-mail";
			}
			
			$usuario=mysql_escape_string($usuario);
			$cahe_usuario=str_replace($sen,"",strtoupper($usuario),$num4);
			
			if($num4>=1)
			{
				echo"Ha introducido caracteres invalidos en el campo Usuario";
			}
			
			$password=mysql_escape_string($password);
			$cahe_password=str_replace($sen,"",strtoupper($password),$num5);
			
			if($num5>=1)
			{
				echo"Ha introducido caracteres invalidos en el campo Password";
			}
			
			//echo"$nombre   $apellido   $email   $usuario   $password";
			
			mysql_query("INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, USUARIO, PASSWORD, ROL) VALUES ('$nombre','$apellido','$email','$usuario','$password','$rol')",$link);
			echo"Registro Exitoso <br>";
			echo"<a href=configuracion.php target=mainFrame>Menu de Configuracion</a>";
		}
		else
		{
			//echo"$nombre   $apellido   $email   $usuario   $password <br>";
			//echo"$flag_nombre   $flag_apellido   $flag_mail   $flag_password <br>";
			echo"Alguno de los datos no ha sido introducido correctamente, por favor llene todos los campos con datos verdaderos <br> <a href=registra_usuario.php>Reintentar</a><br>";
		}	
	}
		
	mysql_close($link);
	
?>