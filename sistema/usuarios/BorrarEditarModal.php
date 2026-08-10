<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['idUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Editar Usuario</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['idUsuario']; ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombreUsuarios']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Usuario:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="usuario" required=""  value="<?php echo $row['usuario']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nivel:</label>
					</div>
					<div class="col-sm-8">
						<select  class="form-control"  required="" id="nivel" name="nivel">
						<?php if($row['nivel'] == 1) { ?>
							 <option value="1" selected>Administrador</option>
							 <option value="2">Vendedor</option>
						<?php } else { ?>
							 <option value="2" selected>Vendedor</option>
							 <option value="1">Administrador</option>
						<?php } ?>
						 </select>
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
<div class="modal fade" id="delete_<?php echo $row['idUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Borrar Usuario</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombreUsuarios']; ?></h2>
			</div>
            <div class="modal-footer">
                <a href="BorrarRegistro.php?id=<?php echo $row['idUsuario']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Borrar</a>
            </div>

        </div>
    </div>
</div>

<!-- Pass -->
<div class="modal fade" id="rest_<?php echo $row['idUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Restablecer Contraseña</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Restablecer la Contraseña?</p>
				<h2 class="text-center"><?php echo $row['nombreUsuarios']; ?></h2>
			</div>
            <div class="modal-footer">
                <a href="restPass.php?id=<?php echo $row['idUsuario']; ?>" class="btn btn-warning"><span class="fa fa-check"></span> Si</a>
            </div>

        </div>
    </div>
</div>

<!-- VerInfo -->
<div class="modal fade" id="info_<?php echo $row['idUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Información del Usuario</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<div class="text-center">
                 <img class="profile-user-img img-fluid img-circle"src="<?php echo $row['foto'];?>" alt="Fotografía" style="width: 150px; height: 150px">
                </div>
                <br>
				<h5 class="text-center"><?php echo $row['nombreUsuarios']; ?></h5>
				<br>
				    <?php 
                    $fecha_nacimiento = $row['fechaNac'];
                    $dia_actual = date("Y-m-d");
                    $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
                    ?>

					<ul class=" fa-ul">
                        <li><span class="fa-li"><i class="fas fa-lg fa-user-circle"></i></span> <b>Usuario:</b> <?php echo $row['usuario']; ?></li>
                    	<li><span class="fa-li"><i class="fas fa-lg fa-sitemap"></i></span> <b>Perfil:</b> <?php echo $tituloNivel; ?></li>
                    	<li><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> <b>Fecha de nacimiento:</b> <?php echo date("d-M-Y", strtotime($row['fechaNac']));?> - <?php echo $edad_diff->format('%y'); ?> años</li>
                    </ul>
                
                    
			</div>
            
        </div>
    </div>
</div>