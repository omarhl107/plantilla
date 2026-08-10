<?php 
include("security/session.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TIENDA</title>
  <link rel="shortcut icon" href="dist/img/logo-icon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="dist/css/fuentegoogle.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Estilo Fondo Animado -->
  <link rel="stylesheet" media="all" href="dist/css/style.css?v=<?php echo time(); ?>">

  <!-- VerPass -->
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
  <!-- VerPass -->

</head>
<body class="hold-transition login-page">
<!-- Fondo Animado -->

<div class="area" align="center">

            <ul class="circles" >
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>

              <div class="login-box" style="padding-top: 7%;">
                <!-- /.login-logo -->
                <div class="card card-outline" style="border-top: 3px solid #0c2b64;">
                  <div class="card-header text-center">
                     <img src="dist/img/logo-hor.png" style="width: 100%" alt="Tienda Logo" class="brand-image" >
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg"><b style="color: #0c2b64">INICIAR SESIÓN</b></p>

                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario">
                      </div>
                     
                      <div class="input-group mb-3">
                        <div class="input-group">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                          <div class="input-group-append">
                            <button id="show_password" class="btn" style="background-color: #0c2b64; border-color: #0c2b64; color: white;" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> 
                                </button>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                         <div class=""><?php if($message!="") { echo $message; } ?></div>
                        <!-- /.col -->
                        <div class="col-12">
                          <button type="submit" class="btn btn-block" style="background-color: #0c2b64; border-color: #0c2b64; color: white;"><i class="nav-icon fas fa-caret-square-right"></i> Ingresar</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>


                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
</div>
    </div >
<!-- Fondo Animado -->


<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
