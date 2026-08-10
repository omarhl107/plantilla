<?php
	session_name("tienda");
	session_start();
	include_once('../dbconect.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$pass = 12345;
			$sql = "UPDATE usuarios SET contrasena = '$pass' WHERE idUsuario = '".$_GET['id']."'";


			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? '3' : '5';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexiÃ³n
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Selecciona al usuario';
	}

	header('location: usuarios.php');

?>

