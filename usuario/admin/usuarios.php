<script src="../../framework/jquery/jquery-2.1.4.min.js"></script>
<link href="../../framework/materialize/font/material-icon.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../../framework/materialize/css/materialize.min.css" media="screen,projection">
<script src="../../framework/materialize/js/materialize.min.js"></script>
<?php
include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM usuario";
$resp=$conn->query($query); 
$numuser = mysqli_num_rows($resp);

?>
		<div class="card-panel grey darken-4" class="col l10 m6 s12">
          <div class="panel-body" class="col l10 m6 s12">
          <?php  if($numuser>0){?>
            <table class="responsive-table">
            <thead>
              <tr>
                <td class="white-text">Nombre</td>
                <td class="white-text">Apellido</td>
                <td class="white-text">Usuario</td>
                <td class="white-text">Contraseña</td>
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
                                <td class="white-text"><?php echo $modulo['apellido'];?></td>
                                <td class="white-text"><?php echo $modulo['usuario'];?></td>
                                <td class="white-text"><?php echo $modulo['pass'];?></td>  
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