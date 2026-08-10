<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['idCategoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Editar Categoría</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['idCategoria']; ?>">
				<div class="row form-group">
					<div class="col-sm-6">
						<label class="control-label" style="position:relative; top:7px;">Nombre de la Categoría:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['categoriaNombre']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="submit" name="editar" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['idCategoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Borrar Categoría</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['categoriaNombre']; ?></h2>
			</div>
            <div class="modal-footer">
                <a href="BorrarRegistro.php?id=<?php echo $row['idCategoria']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Borrar</a>
            </div>

        </div>
    </div>
</div>

