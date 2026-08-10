<?php
	session_name("tienda");
	session_start();
	include_once('../dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre = strtoupper($_POST['nombre']);
			$fecNac = $_POST['fechaNac'];
			$usr = $_POST['user'];
			$pwd = $_POST['password'];
			
			$stmt = $db->prepare("UPDATE usuarios SET nombreUsuarios = ?, fechaNac = ?, usuario = ?, contrasena = ? WHERE idUsuario = ?");
			$_SESSION['message'] = ($stmt->execute([$nombre, $fecNac, $usr, $pwd, $id])) ? '2' : '5';

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

	header('location: perfil.php');

?>

