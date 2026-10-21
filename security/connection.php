<?php
	
	
	$server = "localhost";
	$username = "root";
	$password = "admin123$";
	$dataBase = "plantilla";
	
	if (!($link=@mysqli_connect($server, $username, $password))){
		echo 'No se pudo conectar a la base de datos';
	}
	
	mysqli_set_charset($link,"utf8");

	if(!(@mysqli_select_db($link, $dataBase))){
		echo 'No se pudo seleccionar la base de datos';
	}
?>
