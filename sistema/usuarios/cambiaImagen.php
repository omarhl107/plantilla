<?php
session_name("tienda");
session_start();
include_once('../dbconect.php');

if (isset($_POST['cambiarImg'])) {
    $database = new Connection();
    $db = $database->open();

    try {
        $id = $_GET['id'];
        $carpetaDestino = 'fotos/';
        $filename = $_FILES['imagen']['name'];
        $origen = $_FILES['imagen']['tmp_name'];

        // Verificar si se subiÃ³ un archivo
        if (!empty($filename) && is_uploaded_file($origen)) {
            // Verificar si es una imagen vÃ¡lida
            $allowedTypes = ['image/jpeg', 'image/png'];
            if (in_array($_FILES['imagen']['type'], $allowedTypes)) {
                // Crear la carpeta de destino si no existe
                if (!file_exists($carpetaDestino) && !mkdir($carpetaDestino, 0777, true)) {
                    echo '<br>No se ha podido crear la carpeta: ' . $carpetaDestino;
                } else {
                    // Generar un nuevo nombre para la imagen
                    $explode = explode('.', $filename);
                    $extension_foto = array_pop($explode);
                    $nuevoNameFoto = $id . '.' . $extension_foto;
                    $destino = $carpetaDestino . $nuevoNameFoto;

                    // Mover el archivo a la carpeta destino
                    if (move_uploaded_file($origen, $destino)) {
                        // Actualizar la ruta en la base de datos
                        $sqlRuta = "UPDATE usuarios SET foto = ? WHERE idUsuario = ?";
                        $stmt = $db->prepare($sqlRuta);
                        $stmt->execute([$destino, $id]);
                        $_SESSION['message'] = '2';
                    } else {
                        echo '<br>No se ha podido mover el archivo: ' . $filename;
                    }
                }
            } else {
                echo '<br>' . $filename . ' - El tipo de archivo no es vÃ¡lido';
            }
        } else {
            echo '<br>No se ha subido ningÃºn archivo.';
        }

        $database->close();
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
        echo 'ExcepciÃ³n capturada: ',  $e->getMessage(), "\n";
    }

    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario';
}

header('location: perfil.php');
?>

