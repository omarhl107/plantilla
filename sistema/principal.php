<?php
  session_name("tienda");
  session_start();
  if (!$_SESSION["user_id"]) {
    header("Location:../index.php");
  }

  include_once('dbconect.php');
  $database = new Connection();
  $db = $database->open();
  $db->query("SET NAMES utf8;");
  $usuarios = 0;
  $categorias = 0;
  try {
    $usuarios = (int) $db->query("SELECT COUNT(*) AS total FROM usuarios")->fetch(PDO::FETCH_OBJ)->total;
    $categorias = (int) $db->query("SELECT COUNT(*) AS total FROM categorias")->fetch(PDO::FETCH_OBJ)->total;
  } catch(PDOException $e) {
    echo "Hubo un problema en la conexión: " . $e->getMessage();
  }
  $database->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TIENDA</title>
  <?php $root_path = '../'; ?>
  <link rel="shortcut icon" href="<?php echo $root_path; ?>dist/img/logo-icon.png">
  <?php include('libs.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php include('nav.php'); ?>
  <div class="content-wrapper">
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-info">
              <div class="card-header text-center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                <div style="padding: 10px 0;">
                  <img src="../dist/img/logo-hor.png" alt="Logo" style="max-height: 120px; max-width: 100%; object-fit: contain;">
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $usuarios; ?></h3>
                        <p>Usuarios</p>
                      </div>
                      <div class="icon"><i class="fas fa-users"></i></div>
                      <a href="usuarios/usuarios.php" class="small-box-footer">Abrir módulo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo $categorias; ?></h3>
                        <p>Categorías</p>
                      </div>
                      <div class="icon"><i class="fas fa-boxes"></i></div>
                      <a href="categorias/categorias.php" class="small-box-footer">Abrir módulo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('footer.php'); ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php include('alertas.php'); ?>
</body>
</html>
