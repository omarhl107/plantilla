<?php 
if(isset($_SESSION['message'])){
     $valor = $_SESSION['message'];
  }
  else{
       $valor = 0;
  }
  unset($_SESSION['message']);
 ?>
<script type="text/javascript">
          var id = "<?php echo $valor ?>";
          //alert(id);
          if (id == 1) {
           $(function insertar() {
              Swal.fire({
                title: "Se Guardó Correctamente",
                icon: "success",
                showConfirmButton: false,
                timer: 1700,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
              })
            });
         }else if(id == 2){
            $(function modificar() {
                Swal.fire({
                  title: "Se Modificó Correctamente",
                  icon: "info",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }else if(id == 3){
            $(function contrasena() {
                Swal.fire({
                  title: "Se Reestableció la contraseña Correctamente",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }else if(id == 4){
            $(function eliminar() {
                Swal.fire({
                  title: "Se Eliminó Correctamente",
                  icon: "error",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 5){
            $(function error() {
                Swal.fire({
                  title: "Ocurrió un error, intente nuevamente",
                  icon: "error",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 6){
            $(function recuperar() {
                Swal.fire({
                  title: "Se Recuperó Correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 7){
            $(function ventaRealizada() {
                Swal.fire({
                  title: "Venta realizada correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 8){
            $(function ventaCancelada() {
                Swal.fire({
                  title: "Venta cancelada",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 1000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 9){
            $(function productoRemovido() {
                Swal.fire({
                  title: "Producto quitado de la lista",
                  icon: "info",
                  showConfirmButton: false,
                  timer: 1000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 10){
            $(function productoNoExiste() {
                Swal.fire({
                  title: "El producto que buscas no existe",
                  icon: "info",
                  showConfirmButton: false,
                  timer: 1000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 11){
            $(function productoAgostado() {
                Swal.fire({
                  title: "El producto está agotado",
                  icon: "info",
                  showConfirmButton: false,
                  timer: 1000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 12){
            $(function datosDoc() {
                Swal.fire({
                  title: "Se guardaron los datos correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
           else if(id == 13){
            $(function traspasoRealizada() {
                Swal.fire({
                  title: "El traspaso se realizó correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
           else if(id == 14){
            $(function operacionCancelada() {
                Swal.fire({
                  title: "Operación cancelada",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 1000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 15){
            $(function operacionCorrecta() {
                Swal.fire({
                  title: "Se realizó correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
           else if(id == 16){
            $(function productoEnLista() {
                Swal.fire({
                  title: "Producto en la lista, elija otro",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 2000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 17){
            $(function DevolucionCorrecta() {
                Swal.fire({
                  title: "La devolución se realizó correctamente",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 18){
            $(function errorDevolucion() {
                Swal.fire({
                  title: "Error al procesar la devolución",
                  icon: "error",
                  showConfirmButton: false,
                  timer: 1700,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 19){
            $(function devolucionProductoMin() {
                Swal.fire({
                  title: "La cantidad devuelta no puede ser mayor a la cantidad vendida",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 2000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }
          else if(id == 20){
            $(function errorDatos() {
                Swal.fire({
                  title: "Faltan datos",
                  icon: "warning",
                  showConfirmButton: false,
                  timer: 2000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }

          else if(id == 21){
            $(function errorProductosVenta() {
                Swal.fire({
                  title: "No se encontraron productos de la venta",
                  icon: "error",
                  showConfirmButton: false,
                  timer: 2000,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  });
              }); 
          }          
</script>