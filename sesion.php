<?php
session_start();
	if($_SESSION['acceso'] != 'si')
	{ 
		header('Location: login.html');  
		exit(); 
	}
?>