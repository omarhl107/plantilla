 <?php
  session_name("tienda");
  session_start();
 if(!$_SESSION["user_id"]) {
    header("Location:../../index.php");
  }
  $_SESSION["nombre_usuario"];
  $_SESSION["nivel"];
  $_SESSION["nivelTitulo"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TIENDA</title>
  <link rel="shortcut icon" href="../../dist/img/logo-icon.png">
  <?php 
  include('../libs.php');
   ?>
  
  

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include('../nav.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Button trigger modal -->
<br>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12" >
          
           

           <div class="card">
            <div class="card-header" style="text-align: center;">
              <h2 class="card-title">USUARIOS</h2>
                <br>
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                    <a href="#addnew" class="btn btn-block btn-md btn-primary" data-toggle="modal"><span class="fa fa-user-plus"></span> Nuevo Usuario</a>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <a href="#addIna" class="btn btn-block btn-md btn-danger" data-toggle="modal"><span class="fa fa-user-times"></span> Usuarios Inactivos</a>
                  </div>     
                </div>
                <?php 
                include('AgregarModal.php');
                include('UsuarioInactivoModal.php');
                 ?>
                <br>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row">
                   <?php
                      //incluimos el fichero de conexion
                      include_once('../dbconect.php');
                      $database = new Connection();
                      $db = $database->open();
                      try{  
                        $sql = 'SELECT* FROM usuarios WHERE idUsuario <> '.$_SESSION['user_id'].' AND estado = 1 ORDER BY nivel ASC';
                        foreach ($db->query($sql) as $row) {
                           
                           if ($row['nivel'] == 1) {
                              $tituloNivel = "Administrador";
                              $color = "secondary";
                            }else if($row['nivel'] == 2){
                              $tituloNivel = "Vendedor";
                              $color = "primary";
                            }else{
                              $tituloNivel = "Encargado";
                              $color = "success";
                            }
                          ?>
                           <div class="col-md-3">
                              <div class="card card-<?php echo $color; ?> card-outline">
                                <div class="card-body box-profile">
                                  <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo $row['foto'];?>" alt="FotografÃ­a" style="width: 100px; height: 100px">
                                  </div>
                                  <br>
                                  <p class="text-muted text-center" style="font-size: 13px"> <b><?php echo $row['nombreUsuarios']; ?></b></p>
                                  <p class="text-center"><?php echo $tituloNivel; ?></p>
                                  <div style="text-align: center;">
                                  <a href="#info_<?php echo $row['idUsuario'];?>" class="btn btn-primary btn-sm" title="Ver informaciÃ³n" data-toggle="modal"><span class="fa fa-eye"></span></a>
                                  <a href="#edit_<?php echo $row['idUsuario'];?>" title="Editar" class="btn btn-warning btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> </a>
                                  <a href="#rest_<?php echo $row['idUsuario']; ?>" title="Restablecer contraseÃ±a" class="btn btn-secondary btn-sm" data-toggle="modal"><span class="fa fa-key"></span> </a>
                                  <a href="#delete_<?php echo $row['idUsuario']; ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> </a>
                                  </div>
                                </div>
                            </div>
                            <?php 
                              include('BorrarEditarModal.php');
                              //include('recetaModal.php'); 
                              
                            ?>
                          </div>
                          <?php 
                        }
                      }
                      catch(PDOException $e){
                        echo "Hubo un problema en la conexiÃ³n: " . $e->getMessage();
                      }

                      //Cerrar la Conexion
                      $database->close();
                     ?>
                </div>

               
              </div>
              <!-- /.card-body -->
            </div>
         </div>
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>

    <div id="divModal"></div>
        <script>
          function Recuperar(id) {
             //alert(id);
                var rutas = 'RecuperarModal.php?recuperar=' + id;
                $.get(rutas, function (data) {
                    $('#divModal').html(data);
                    $('#myModalRecuperar').modal('show');
                });
            }
        </script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Nombre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <input type="text" class="form-control" name="nombreOrden">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('../footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('../alertas.php'); ?>
</body>
</html>


