<?php 
    $idUser = $_REQUEST['recuperar'];
        include_once('../dbconect.php');
            $database = new Connection();
            $db = $database->open();
                try{
                    $sql ='SELECT * FROM usuarios WHERE idUsuario = "'.$idUser.'"';
                    foreach ($db->query($sql) as $row) {
                    
                    }
                }
                catch(PDOException $e){
                    echo "Hubo un problema en la conexión: " . $e->getMessage();
                }
                $database->close();
 ?>
<div class="modal fade" id="myModalRecuperar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Activar Usuario</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">    
                <p class="text-center">¿Estas seguro de activar el registro?</p>
                <h2 class="text-center"><?php echo $row['nombreUsuarios']; ?></h2>
            </div>
            <div class="modal-footer">
                <a href="RecuperarRegistro.php?id=<?php echo $row['idUsuario']; ?>" class="btn btn-success"><span class="fa fa-recycle"></span> Activar</a>
            </div>

        </div>
    </div>
</div>
