<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nombre">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Usuario:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="usuario">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tipo de Usuario:</label>
					</div>
					<div class="col-sm-8">
						<select class="form-control" name="tipoUser" required="" id="tipoUser">
				          <option value="">--Selecciona--</option>
				          <option value="1">Administrador</option>
				          <option value="2">Vendedor</option>
				        </select>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-12">
						<p style="text-align: justify; font-size: 14px">Nota: El nuevo usuario tendrá que iniciar sesión con el usuario que se le asigno y la contraseña <b>12345</b>.</p>
					</div>
				</div>
				
            </div> 
			</div>
            <div class="modal-footer">
                
                <button type="submit" name="agregar" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
			</form>
            </div>

        </div>
    </div>
</div>