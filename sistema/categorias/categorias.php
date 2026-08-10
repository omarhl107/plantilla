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
              <h2 class="card-title">CATEGORÍAS</h2>
                <br>
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                      <a href="#addnew" class="btn btn-block btn-md btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nueva Categoría</a>
                  </div> 
                  <div class="col-xs-12 col-md-4">
                      <a href="#addIna" class="btn btn-block btn-md btn-danger" data-toggle="modal"><span class="fa fa-minus"></span> Datos Inactivos</a>
                  </div> 
                </div>
                <?php 
                include('AgregarModal.php');
                include('datosInactivoModal.php');
                 ?>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                  <thead>
                  <tr>
                    <th >#</th>
                    <th >Nombre</th>
                    <th >Editar</th>
                    <th >Eliminar</th>
                  </tr>
                  </thead>
                  <tbody style="text-align: center;">
                 <?php
                      //incluimos el fichero de conexion
                      include_once('../dbconect.php');

                      $database = new Connection();
                      $db = $database->open();
                      try{  
                        $sql = 'SELECT * FROM categorias WHERE estado = 1';
                        foreach ($db->query($sql) as $row) {
                          ?>
                          <tr>
                            <td><?php echo $row['idCategoria']; ?></td>
                            <td><?php echo $row['categoriaNombre']; ?></td>
                            <td >
                              <a href="#edit_<?php echo $row['idCategoria']; ?>" class="btn btn-warning btn-md" data-toggle="modal"><span class="fa fa-edit"></span></a>
                            </td>
                            <td >
                              <a  href="#delete_<?php echo $row['idCategoria']; ?>" class="btn btn-danger btn-md" data-toggle="modal"><span class="fa fa-trash"></span></a>
                            </td>
                            <?php 
                              include('BorrarEditarModal.php');
                            ?>
                          </tr>
                          <?php 
                        }
                      }
                      catch(PDOException $e){
                        echo "Hubo un problema en la conexiÃ³n: " . $e->getMessage();
                      }

                      //Cerrar la Conexion
                      $database->close();
                     ?>
                  </tbody>
                </table>
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


