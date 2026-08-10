<?php
session_name("tienda");
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();

	
	$status = 1;

	try{
		//hacer uso de una declaraciÃ³n preparada para prevenir la inyecciÃ³n de sql
		$stmt = $db->prepare("INSERT INTO categorias (categoriaNombre, estado) VALUES (:categoriaNombre, :estado)");
		//instrucciÃ³n if-else en la ejecuciÃ³n de nuestra declaraciÃ³n preparada
		$_SESSION['message'] = ($stmt->execute(array(':categoriaNombre' => strtoupper($_POST['nombre']), ':estado' => $status))) ? '1' : '5';	
	
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

header('location: categorias.php');
	
?>

