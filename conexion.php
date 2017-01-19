<?php

$link		=mysql_connect('localhost','root','');
$db_selected=mysql_select_db('lab master',$link);

	if(!$link)
	{					
		die('Not Connected: '.mysql_error());
		echo mysql_error();
	}
	
?>