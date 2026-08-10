<?php
session_name("tienda");
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();

	date_default_timezone_set('America/Mexico_City');
	$pass = 12345;
	$status = 1;
	$foto = "fotos/user.png";

	try{
		//hacer uso de una declaraciÃ³n preparada para prevenir la inyecciÃ³n de sql
		$stmt = $db->prepare("INSERT INTO usuarios (nombreUsuarios, foto, usuario, contrasena, nivel, estado) VALUES (:nombreUsuarios, :foto, :usuario, :contrasena, :nivel, :estado)");
		//instrucciÃ³n if-else en la ejecuciÃ³n de nuestra declaraciÃ³n preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombreUsuarios' => strtoupper($_POST['nombre']), ':foto' => $foto, ':usuario' => $_POST['usuario'], ':contrasena' => $pass, ':nivel' => $_POST['tipoUser'], ':estado' => $status)) ) ? '1' : '5';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: usuarios.php');
	
?>

