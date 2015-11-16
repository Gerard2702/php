<?php include("../../class/conexion/conexion.php"); $conn = new Conexion();
$conn->conectar(); 
$query="SELECT * FROM producto";
$resp=$conn->query($query);  $numuser = mysqli_num_rows($resp); 
?>
		<div class="card-panel grey darken-4">
          <div class="panel-body">
          <?php  if($numuser>0){?>
            <table class="table  table-hover">
            <thead>
              <tr>
                <td class="validate white-text">Nombre</td>
                <td class="validate white-text">Descripcion</td>
                <td class="validate white-text">Precio</td>
                <td class="validate white-text">Estado</td>
                <td class="validate white-text">Cantidad</td>
              </tr>
              </thead>
              <tbody>
                <?php   

                  while($modulo = $resp->fetch_assoc()){                    
                                        ?>
                                <tr>
                                <td class="validate white-text"><?php echo $modulo['nombre'];?></td>
                                <td class="validate white-text"><?php echo $modulo['descripcion'];?></td>
                                <td class="validate white-text"><?php echo $modulo['precio'];?></td>
                                <td class="validate white-text"><?php echo $modulo['estado'];?></td>  
                                <td class="validate white-text"><?php echo $modulo['cantidad'];?></td>                                  
                                </tr>   
                                    <?php  }//fin del mientras que recorre resultados

                                ?>
              </tbody>
            </table>
            <?php } else {}?>
          </div>
      </div>