<?php
	session_name("tienda");
	session_start();
	include_once('../dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombreUsuario =  strtoupper($_POST['nombre']);
			$user = $_POST['usuario'];
			$nivel = $_POST['nivel'];

			$sql = "UPDATE usuarios SET nombreUsuarios = '$nombreUsuario', usuario = '$user', nivel = '$nivel' WHERE idUsuario = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? '2' : '5';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexiÃ³n
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario';
	}

	header('location: usuarios.php');

?>

