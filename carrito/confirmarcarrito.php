<?php
include("librerias/conexion/conexion.php");

session_start(); /* Verificar inicio de sesion*/
if(isset($_SESSION['usuario'])){
$usuario = $_SESSION['usuario'];

$sql = "SELECT cliente.nombre_cliente,cliente.apellido_cliente,cliente.usuario,pais.nombre,direccion_de_envio.ciudad,direccion_de_envio.estado,direccion_de_envio.direccion,
direccion_de_envio.codigo_postal,direccion_de_envio.telefono from direccion_de_envio inner join cliente on cliente.idcliente=
direccion_de_envio.idcliente inner join pais on pais.idpais=direccion_de_envio.idpais where cliente.usuario='$usuario';";
$rs = mysql_query($sql);
$datos= mysql_fetch_array($rs,MYSQL_ASSOC);

$nombre_cliente=$datos['nombre_cliente']." ".$datos['apellido_cliente'];
$pais=$datos['nombre'];
$estado = $datos['estado'];
$ciudad = $datos['ciudad'];
$direccion = $datos['direccion'];
$codigo_postal = $datos['codigo_postal'];
$telefono = $datos['telefono'];

}
else{
  header("location:login.php");
}

 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>TshirtIdea-CAMISETAS PERSONALIZADAS</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="librerias/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="librerias/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body id="mibody">
  <ul id="dropdownusu1" class="dropdown-content">
    <li><a style="color:black" href="librerias/php/cerrarSesion.php">Cerrar Sesion</a></li>
  </ul>
  <div class="container">
    <div class="row">
     <div class="col s12 m12 l12">
       <h5>Completar Transacción</h5>
       <h5 class="grey-text">Revisar los detalles de compra.</h5>
     </div>
     <div class="col s12 m9 l9">
       <div class="mi-card-panel white">
      <table>
        <thead>
          <tr class="grey-text">
              <th data-field="envio"><i class="material-icons left green-text text-accent-4">verified_user</i>Enviar a</th>
              <th data-field="name"><i class="material-icons left ">payment</i>Pagar con</th>
          </tr>
        </thead>

        <tbody>
        <tr class="grey-text text-darken-4">
          <td><?php echo $nombre_cliente;?><br>
              <?php echo $direccion;?><br>
              <?php echo $ciudad.", ".$estado.", ".$codigo_postal;?><br>
              <?php echo $pais;?><br>
              <?php echo $telefono;?>

          </td>
          <td style="vertical-align: none">
            <img src="librerias/images/logo_paypal_pmt1401.png" alt="loco paypal">
          </td>
        </tr>
        </tbody>
      </table>
       </div>
     </div>
     <div class="col s12 m3 l3">
       <div class="mi-card-panel white">
         <h6><strong class="red-text">Total:<h5><?php echo "US $".$_SESSION['totallibros'];?></h5></strong></h6>
       </div>
     </div>
     <div class="col s12 m9 l9">
     <div class="mi-card-panel white">
      <table class="responsive-table black-text bordered white" >
        <thead>
          <tr>
          <th data-field="price"></th>
              <th data-field="nombre"></th>
              <th data-field="name" class="right-align">Precio</th>
              <th data-field="name" class="right-align">Cantidad</th>         
              <th data-field="price" class="right-align">Sub Total</th> 
          </tr>
        </thead>
        <tbody>
        <?php
          $micarrito=$_SESSION['carrito'];
            if(isset($micarrito)){
              $Total=0;
              $cantidadarticulos=0;
              for($i=0;$i<count($micarrito);$i++){   
                if($micarrito[$i]!=NULL){ 
        ?>
        <tr>
          <td><img src="<?php echo $micarrito[$i]['imagen']?>" alt="" width="100" height="125"> </td>
          <td><?php echo $micarrito[$i]['nombre'];?></td>
           <td class="right-align"><?php echo "US $".$micarrito[$i]['precio'];?></td>
           <td class="right-align " ><?php echo $micarrito[$i]['cantidad'];?></td> 
           <?php $subtotal=$micarrito[$i]['precio']*$micarrito[$i]['cantidad'];
                 $Total=$Total+$subtotal;?>
          <td class="right-align"><?php echo "US $".$subtotal;?></td>     
          </tr>  
        <?php
            $cantidadarticulos++;
            }
          }
        } 
        ?>
        <tr><td colspan="5" class="right-align">Sub Total( <?php echo $cantidadarticulos?> Libros): <?php echo "US $".$Total;?>
        <br>Gastos de Envio: $ 0.00
        <br><strong class="red-text">Total a Pagar: <?php echo "US $".$Total;?></strong>
        </td>
        </tr>
        <tr>
          <td colspan="5" class="right-align">
            <form action="librerias/php/registro.php" method="POST">
            <a href="detacompraebooks.php">
              <button title="Tramitar" type="submit" name="funcion"  value="ConfirmarCompra"class="waves-effect waves-light btn light-blue darken-4">
                Confirmar
              </button>
            </a>
           </form> 
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>
      