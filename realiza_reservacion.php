<?php include("sesion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Realiza Reservacion</title>
	<script languaje='javascript' src="popcalendar.js"></script>
	<link href=labmaster.css rel=stylesheet type=text/css>
</head>

<body>

	<form name="form1" action="reserva.php" method="post">
		
		<fieldset id=form2>
			<legend>Reservacion del Laboratorio</legend>
				
				<ol>
					<li><label>Fecha:</label><input name="fecha" readonly type="text" id="dateArrival" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy-mm-dd');" size="10"></li>
					<li><label>Hora:</label><select name=hora></li>
		<?php
		include("conexion.php");
		
			$query=mysql_query("SELECT ID_HORA, HORA FROM horas",$link);
			
										while($temp=mysql_fetch_assoc($query))
										{
											echo"<option value='".$temp['HORA']."'>".$temp['HORA']."</option>";
										}
		?>
		</select>
		
					<li><label>Equipo:</label><select name=equipo></li>
		<?php
		include("conexion.php");
		
			$query_e=mysql_query("SELECT ID_EQUIPO, NOMBRE_EQ FROM equipos",$link);
			
										while($temp=mysql_fetch_assoc($query_e))
										{
											echo"<option value='".$temp['NOMBRE_EQ']."'>".$temp['NOMBRE_EQ']."</option>";
										}
		?>
		</select>
					
					<li><label>Comentario:</label><textarea name=comentario cols=50 rows=5></textarea></li>
		
				</ul>
				
				<p align=center><input type=submit value=Reservar name=submit class=btn/>
				
		</fieldset>
		
		</form>

</body>

</html>
