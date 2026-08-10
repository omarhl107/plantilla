<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Agregar Categoría</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-6">
						<label class="control-label" style="position:relative; top:7px;">Nombre de la categoría:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" required="" name="nombre">
					</div>
				</div>
				
				
			</div> 
			</div>
            <div class="modal-footer">
                
                <button type="submit" name="agregar" class="btn btn-primary"><span class="fa fa-save"> </span> Guardar</button>
			</form>
            </div>

        </div>
    </div>
</div>