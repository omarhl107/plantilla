<!-- Ventana Editar Registros CRUD -->
<script type="text/javascript">
  function mostrarPassword(){
      var cambio = document.getElementById("password");
      if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    } 
    $(document).ready(function () {
    //CheckBox mostrar contraseña
    $('#ShowPassword').click(function () {
      $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
  });
  </script>
<div class="modal fade" id="editInf_<?php echo $row['idUsuario'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Editar datos</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarDatos.php?id=<?php echo $row['idUsuario']; ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombreUsuarios'];?>">
					</div>
				</div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" style="position:relative; top:7px;">Fecha de nacimiento:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fechaNac" value="<?php echo $row['fechaNac']; ?>">
                    </div>
                </div>

                <hr>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" style="position:relative; top:7px;">Usuario:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="user" value="<?php echo $row['usuario']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" style="position:relative; top:7px;">Contraseña nueva:</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['contrasena']; ?>">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> 
                                     </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="text-align: justify; font-size: 14px">La contraseña tiene que ser diferente de <b>12345</b>.</p>
			 </div> 
			</div>
            <div class="modal-footer">
                <button type="submit" name="editar" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>



<!-- VerInfo -->
<div class="modal fade" id="changeImg_<?php echo $row['idUsuario'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Foto de Perfil</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<div class="text-center">
                 <img class="profile-user-img img-fluid img-circle"src="<?php echo $row['foto'];?>" alt="Fotografía" style="width: 200px; height: 200px">
                </div>
                <br>
                <hr>
                <h5>Cambiar imagen</h5>
                <br>
                <div class='alert alert-info' style="text-align: justify; width: 100%"><span><i class="fas fa-info-circle"></i></span> Elegir una imagen cuadrada, es decir, una imagen con resolución 400*400 PX.</div>
                <form method="POST" action="cambiaImagen.php?id=<?php echo $row['idUsuario'];?>" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Selecciona Imagen:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="file"  id="imagen[]"  class="form-control imagen"  multiple name="imagen">
                        </div>
                        <div class="col-sm-12" align="right">
                            <br>
                            <hr>
                            <button type="submit" name="cambiarImg" class="btn btn-success"><span class="fa fa-check"></span> Actualizar Imagen</button>
                        </div>
                    </div>
                </form>
			</div>
            
        </div>
    </div>
</div>