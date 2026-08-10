<?php
  $root_path = isset($root_path) ? $root_path : '../../';
  include_once('dbconect.php');
  $database = new Connection();
  $db = $database->open();
  $db->query("SET NAMES utf8;");
  $nombreNegocio = 'TIENDA';
  try {
    $sql = 'SELECT * FROM usuarios WHERE idUsuario = '.$_SESSION["user_id"];
    foreach ($db->query($sql) as $row) {
    }
    
    $sqlConfig = 'SELECT nombreNegocio FROM configuracion LIMIT 1';
    $stmtConfig = $db->query($sqlConfig);
    if ($stmtConfig && $configRow = $stmtConfig->fetch(PDO::FETCH_ASSOC)) {
        $nombreNegocio = $configRow['nombreNegocio'];
    }
  } catch(PDOException $e) {
    echo "Hubo un problema en la conexión: " . $e->getMessage();
  }
  $database->close();
?>
<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #0c2b64 !important;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <div class="user-panel mt-0 pb-0 mb-0 d-flex">
          <img src="<?php echo $root_path . 'sistema/usuarios/'.$row['foto'];?>" class="img-circle" alt="Fotografía" style="width: 35px; height: 35px">
          <div class="info">
            <span class="hidden-xs"><?php echo $_SESSION["nombre_usuario"]; ?></span>
          </div>
        </div>
      </a>
      <ul class="dropdown-menu" style="text-align: center;">
        <li class="user-header">
          <img src="<?php echo $root_path . 'sistema/usuarios/'.$row['foto'];?>" class="img-circle" alt="Fotografía" style="width: 100px; height: 100px">
          <p><?php echo $_SESSION["nombre_usuario"]; ?></p>
          <p><?php echo $_SESSION["user_name"]; ?></p>
          <p><?php echo $_SESSION["nivelTitulo"]; ?></p>
        </li>
        <div class="dropdown-divider"></div>
        <li class="user-footer">
          <div class="pull-right">
            <div class="btn-group">
              <a href="<?php echo $root_path; ?>sistema/usuarios/perfil.php" title="Editar Perfil" class="btn btn-default" style="margin: 0.1em"><i class="nav-icon fas fa-user"></i> Perfil</a>
              <a href="<?php echo $root_path; ?>security/logout.php" title="Cerrar sesión" class="btn btn-default" style="margin: 0.1em"><i class="nav-icon fas fa-caret-square-left"></i> Salir</a>
            </div>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-danger elevation-4">
  <a href="<?php echo $root_path; ?>sistema/principal.php" class="brand-link">
    <img src="<?php echo $root_path; ?>dist/img/logo.png" alt="Tienda Logo" class="brand-image">
    <span class="brand-text font-weight-light"><?php echo htmlspecialchars($nombreNegocio); ?></span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo $root_path; ?>sistema/principal.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if ($_SESSION["nivel"] == 1 || $_SESSION["nivel"] == 3) { ?>
        <li class="nav-item">
          <a href="<?php echo $root_path; ?>sistema/usuarios/usuarios.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo $root_path; ?>sistema/categorias/categorias.php" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Categorías</p>
          </a>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</aside>
