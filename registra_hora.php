<?php

include("sesion.php");
include("conexion.php");

echo"<link href='labmaster.css' rel='stylesheet' type='text/css'>";

	echo"<form action=horas.php method=post>";

		echo"<fieldset id=form1>";
			echo"<legend>Registro de Hora</legend>";
				echo"<ol>";
				
				echo"<li><label>Seleccione</label><select name=horas[] multiple=multiple></li>";
													echo"<option value=00:00:00>00:00 - 01:00</option>";
													echo"<option value=01:00:00>01:00 - 02:00</option>";
													echo"<option value=02:00:00>02:00 - 03:00</option>";
													echo"<option value=03:00:00>03:00 - 04:00</option>";
													echo"<option value=04:00:00>04:00 - 05:00</option>";
													echo"<option value=05:00:00>05:00 - 06:00</option>";
													echo"<option value=06:00:00>06:00 - 07:00</option>";
													echo"<option value=07:00:00>07:00 - 08:00</option>";
													echo"<option value=08:00:00>08:00 - 09:00</option>";
													echo"<option value=09:00:00>09:00 - 10:00</option>";
													echo"<option value=10:00:00>10:00 - 11:00</option>";
													echo"<option value=11:00:00>11:00 - 12:00</option>";
													echo"<option value=12:00:00>12:00 - 13:00</option>";
													echo"<option value=13:00:00>13:00 - 14:00</option>";
													echo"<option value=14:00:00>14:00 - 15:00</option>";
													echo"<option value=15:00:00>15:00 - 16:00</option>";
													echo"<option value=16:00:00>16:00 - 17:00</option>";
													echo"<option value=17:00:00>17:00 - 18:00</option>";
													echo"<option value=18:00:00>18:00 - 19:00</option>";
													echo"<option value=19:00:00>19:00 - 20:00</option>";
													echo"<option value=20:00:00>20:00 - 21:00</option>";
													echo"<option value=21:00:00>21:00 - 22:00</option>";
													echo"<option value=22:00:00>22:00 - 23:00</option>";
													echo"<option value=23:00:00>23:00 - 00:00</option>";
				echo"</select>";
			
			echo"</ul>";
		
				echo"<p align=center><input type=submit value=Registrar name=submit class=btn/>";
		
	echo"</fieldset>";
	
	echo"</form>";
	
	mysql_close($link);

?>