<?php
include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM empresa";
$resp=$conn->query($query); 
$numuser = mysqli_num_rows($resp);

?>
		<div class="card-panel grey darken-4">
          <div class="panel-body">
          <?php  if($numuser>0){?>
            <table class="table  table-hover">
            <thead>
              <tr>
                <td class="white-text">Nombre</td>
                <td class="white-text">Descripcion</td>
                <td class="white-text">Usuario</td>
                <td class="white-text">Telefono</td>
                <td class="white-text">Correo</td>
                <td class="white-text">Opciones</td>
              </tr>
              </thead>
              <tbody>
                <?php   

                  while($modulo = $resp->fetch_assoc()){
                                        ?>
                                <tr>
                                <td class="white-text"><?php echo $modulo['nombre'];?></td>
                                <td class="white-text"><?php echo $modulo['descripcion'];?></td>
                                <td class="white-text"><?php echo $modulo['usuario'];?></td>
                                <td class="white-text"><?php echo $modulo['telefono'];?></td>  
                                <td class="white-text"><?php echo $modulo['correo'];?></td>              
                                <td><button class="btn-floating waves-effect waves-light" title="Modificar" id="modificar"><i class="material-icons white-text">settings</i></button>&nbsp;<button class="btn-floating waves-effect waves-light" title="Eliminar"><i class="material-icons white-text">close</i></button></td>
                                </tr>   
                                    <?php  }//fin del mientras que recorre resultados

                                ?>
              </tbody>
            </table>
            <?php } else {}?>
          </div>
      </div>