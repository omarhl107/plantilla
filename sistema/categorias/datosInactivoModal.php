<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addIna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Datos Inactivos</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			   <table  class="table table-bordered table-hover" style="text-align: center; font-size: 15px">
                          <thead>
                          <tr>
                            <th>Categoría</th>
                            <th>Activar</th>
                          </tr>
                          </thead>
                          <tbody style="text-align: center;">
    			 <?php 
			        include_once('../dbconect.php');
			            $database = new Connection();
			            $db = $database->open();
                 try{
                    $sql ='SELECT idCategoria, categoriaNombre, estado FROM categorias WHERE estado = 0';
                    foreach ($db->query($sql) as $row) {
                      ?>
                        <tr>
                            <td><?php echo $row['categoriaNombre'];?></td>
                             <td><a href="javascript:void(0)" onclick="Recuperar('<?php echo $row['idCategoria']; ?>')" class="btn btn-warning btn-md"><span class="fa fa-recycle"></span> </a></td>
                            
                        </tr>
                          <?php   
                        
                    }
                }
                catch(PDOException $e){
                    echo "Hubo un problema en la conexión: " . $e->getMessage();
                }
                $database->close();
                  ?>
                  </tbody>
                </table>
			</div>
            <div class="modal-footer">
                
            </div>

        </div>
    </div>
</div>