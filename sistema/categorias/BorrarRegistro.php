<?php
	session_name("tienda");
	session_start();
	include_once('../dbconect.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE categorias SET estado = 0 WHERE idCategoria = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? '4' : '5';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexiÃ³n
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Selecciona la CategorÃ­a a eliminar';
	}

	header('location: categorias.php');

?>

