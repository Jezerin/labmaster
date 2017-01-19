<?php

include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

$usuario 	=$_POST['usuario'];
$password	=$_POST['password'];

	if(empty($usuario) || empty($password))
	{ 
		echo"El usuario o password no han sido ingresados <a href=login.html>Reintentar</a>";
		echo"<a href=recuperar_password.php>Ha Olvidado su Password</a>";
    }
	else
	{
        $user 	=mysql_real_escape_string($usuario);
        $clave 	=mysql_real_escape_string($password); 
		
            $query=mysql_query("SELECT * FROM usuarios WHERE USUARIO='$user' AND PASSWORD='$clave'",$link);
             
			if($row = mysql_fetch_array($query))
			{ 
				session_start();
                $_SESSION['ID'] = $row['ID_USUARIO'];
				$_SESSION['nombre'] = $row['NOMBRE'];
                $_SESSION['apellido'] = $row['APELLIDO'];
				$_SESSION['email'] = $row['EMAIL'];
				$_SESSION['rol'] = $row['ROL'];
                $_SESSION['acceso'] = 'si';
				header('Location: index.php'); 
            }
			else
			{ 
				echo"Error, <a href=login.html>Reintentar</a>";
				echo"<a href=recuperar_password.php>Ha Olvidado su Password</a>";
            }
    }
?>