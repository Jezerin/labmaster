<?php

include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";
	
$usuario		=$_POST['usuario'];
$email			=$_POST['email'];

	echo"$usuario   $email";

function texto_aleatorio()
{	
	$long = 5;
	$letras_min = true;
	$letras_max = true;
	$num = true;
	$salt = $letras_min?'abchefghknpqrstuvwxyz':'';
	$salt .= $letras_max?'ACDEFHKNPRSTUVWXYZ':'';
	$salt .= $num?(strlen($salt)?'2345679':'0123456789'):'';

 	if(strlen($salt) == 0)
	{		
		return '';	
	}

 	$i = 0;
	$str = '';
 	srand((double)microtime()*1000000);
 	
	while($i < $long)
	{
		$num = rand(0, strlen($salt)-1);
		$str .= substr($salt, $num, 1);
		$i++;
	}

 	return $str;
}

	if(empty($usuario) || empty($email))
	{
		echo"Por favor para recuperar su contraseña introduzca un usuario y correo validos para el sistema";
		echo"<a href=login.html>Login</a>";
	}
	else
	{
		$query	=mysql_query("SELECT USUARIO, EMAIL, PASSWORD FROM usuarios WHERE USUARIO='$usuario' AND EMAIL='$email'");
	
		if($row=mysql_fetch_array($query))
		{
			$psstemp=texto_aleatorio();
			
			//echo"$psstemp";
			
			$emailusuario=$email;
			$texto="Ha solicitado un envio de contraseña temporal a correo electronico, esta es su contraseña $row[5], por favor entre a Lab Master y cambiela inmediatamente";
			
			//mysql_query("UPDATE usuarios SET PASSWORD=$psstemp WHERE USUARIO='$usuario'",$link);
			/*
			// Please specify your Mail Server - Example: mail.yourdomain.com.
			ini_set("SMTP","jezer.eduardo.mr@gmail.com");
			// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
			ini_set("smtp_port","25");
			// Please specify the return address to use
			ini_set('sendmail_from', 'jezer.eduardo.mr@gmail.com');
			*/
			
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			$headers .= "From: Administrador <jezer.eduardo.mr@gmail.com>\r\n";
			mail($emailusuario,"Recuperación Password",$texto ,$headers);
			echo"Se ha enviado un mail a la direccion de correo electronico indicada";
			echo"<a href=login.html>Login</a>";
		}
		else
		{
			echo"No se encontro coincidencia para los datos que introdujo";
			echo"<li><a href=login.html>Login</a></li>";
		}
	}
	
	mysql_close($link);

?>