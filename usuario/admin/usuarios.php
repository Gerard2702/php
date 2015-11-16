<?php
include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM usuario";
$resp=$conn->query($query); 
$numuser = mysqli_num_rows($resp);

?>
		<div class="card-panel grey darken-4">
          <div class="panel-body">
          <?php  if($numuser>0){?>
            <table class="table  table-hover">
            <thead>
              <tr>
                <td class="validate white-text">Nombre</td>
                <td class="validate white-text">Apellido</td>
                <td class="validate white-text">Usuario</td>
                <td class="validate white-text">Contraseña</td>
                <td class="validate white-text">Correo</td>
                <td class="validate white-text">Opciones</td>
              </tr>
              </thead>
              <tbody>
                <?php   

                  while($modulo = $resp->fetch_assoc()){
                                        ?>
                                <tr>
                                <td class="validate white-text"><?php echo $modulo['nombre'];?></td>
                                <td class="validate white-text"><?php echo $modulo['apellido'];?></td>
                                <td class="validate white-text"><?php echo $modulo['usuario'];?></td>
                                <td class="validate white-text"><?php echo $modulo['pass'];?></td>  
                                <td class="validate white-text"><?php echo $modulo['correo'];?></td>              
                                <td><button class="btn-floating waves-effect waves-light" title="Modificar"><i class="material-icons white-text">settings</i></button>&nbsp;<button class="btn-floating waves-effect waves-light" title="Eliminar"><i class="material-icons white-text">close</i></button></td>
                                </tr>   
                                    <?php  }//fin del mientras que recorre resultados

                                ?>
              </tbody>
            </table>
            <?php } else {}?>
          </div>
      </div>