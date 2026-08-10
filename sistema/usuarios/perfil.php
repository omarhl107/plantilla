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
  <title>SISTEMA</title>
  <link rel="shortcut icon" href="../../dist/img/logo-icon.png">
  <?php 
  include('../libs.php');
   ?>

  <style>
    .profile-photo-wrapper{
      position: relative;
      display: inline-block;
    }
    .profile-photo-edit-btn{
      position: absolute;
      right: 6px;
      bottom: 6px;
      width: 38px;
      height: 38px;
      padding: 0;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      z-index: 2;
      box-shadow: 0 6px 16px rgba(0,0,0,.18);
      font-size: 14px;
    }
  </style>

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
              <h2 class="card-title">PERFIL</h2>
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
                         $sql = 'SELECT * FROM usuarios WHERE idUsuario = '.(int)$_SESSION['user_id'].' AND estado = 1';
                         foreach ($db->query($sql) as $row) {
                            
                             if ($row['nivel'] == 1) {
                               $tituloNivel = "Administrador";
                               $color = "primary";
                             } else {
                               $tituloNivel = "Vendedor";
                               $color = "success";
                             }

                             $fecha_nacimiento = $row['fechaNac'];
                             $dia_actual = date("Y-m-d");
                             $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
                          ?>
                           <div class="col-md-4">
                              <div class="card card-<?php echo $color; ?> card-outline">
                                <div class="card-body box-profile">
                                  <div class="text-center">
                                    <div class="profile-photo-wrapper">
                                      <img class="profile-user-img img-fluid img-circle" src="<?php echo $row['foto'];?>" alt="FotografÃ­a" style="width: 165px; height: 165px">
                                      <a href="#changeImg_<?php echo $row['idUsuario'];?>" class="btn btn-<?php echo $color; ?> profile-photo-edit-btn" title="Cambiar imagen" aria-label="Cambiar imagen" data-toggle="modal">
                                        <span class="fas fa-camera"></span>
                                      </a>
                                    </div>
                                  </div>
                                  <br>
                                  <p class="text-muted text-center" style="font-size: 16px"> <b><?php echo $row['nombreUsuarios']; ?></b></p>
                                  <p class="text-center"><?php echo $tituloNivel; ?></p>
                                  <p class="text-center"><?php echo $edad_diff->format('%y'); ?> años</p>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                              <div class="card card-<?php echo $color; ?> card-outline">
                                <div class="card-body box-profile">
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="<?php echo $row['nombreUsuarios'];?>" disabled="">
                                  </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="<?php echo date("d-M-Y", strtotime($row['fechaNac']));?>" disabled="">
                                  </div>
                                  <div style="text-align: right;">
                                    <a href="#editInf_<?php echo $row['idUsuario'];?>" title="Editar" class="btn btn-warning btn-md" data-toggle="modal"><span class="fa fa-edit"></span> Editar datos</a>
                                  </div>
                                </div>
                            </div>
                            <?php 
                              include('PerfilModal.php'); 
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
                      <div class='alert alert-danger' style="text-align: center; width: 100%"><span><i class="fas fa-info-circle"></i></span> Para aplicar los cambios correctamente, por favor cierra la sesión y  vuelve a iniciar.</div>
                </div>

               
              </div>
              <!-- /.card-body -->
            </div>
         </div>
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>


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


