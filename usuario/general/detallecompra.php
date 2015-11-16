<?php
//include("librerias/conexion/conexion.php");

session_start(); /* Verificar inicio de sesion*/
/*if(isset($_SESSION['id'])){
$usuario = $_SESSION['usuario'];*/

/*$sql = "SELECT cliente.idcliente,cliente.nombre_cliente,cliente.apellido_cliente,cliente.usuario,pais.nombre,direccion_de_envio.ciudad,direccion_de_envio.estado,direccion_de_envio.direccion,
direccion_de_envio.codigo_postal,direccion_de_envio.telefono from direccion_de_envio inner join cliente on cliente.idcliente=
direccion_de_envio.idcliente inner join pais on pais.idpais=direccion_de_envio.idpais where cliente.usuario='$usuario';";
$rs = mysql_query($sql);
$datos= mysql_fetch_array($rs,MYSQL_ASSOC);*/

/*$idcliente = $datos['idcliente'];
$nombre_cliente=$datos['nombre_cliente']." ".$datos['apellido_cliente'];
$pais=$datos['nombre'];
$estado = $datos['estado'];
$ciudad = $datos['ciudad'];
$direccion = $datos['direccion'];
$codigo_postal = $datos['codigo_postal'];
$telefono = $datos['telefono'];*/
$idfacturacion = $_SESSION['facturacion'];
$sql3="SELECT *from compra where compra.idcompra='$idfacturacion'";
$rs3= mysql_query($sql3);
$datofecha= mysql_fetch_array($rs3,MYSQL_ASSOC);
$sql2 = "SELECT compra.fecha_compra,producto.nombre,producto.precio,producto.imagen from detalle_compra inner join 
compra on compra.idcompra = detalle_compra.compra_idcompra 
inner join producto on producto.idproducto=detalle_compra.producto_idproducto where compra.idcompra='$idfacturacion';";
$rs22 = mysql_query($sql2);
$rs2 = mysql_query($sql2);
$TOTAL=0;
while($costos = mysql_fetch_array($rs22,MYSQL_ASSOC)){
  $subtotal= $costos['precio']*1;
  $TOTAL= $subtotal+$TOTAL;
}
/*}
else{
  header("location:login.php");
}*/

?>
  <div class="container">
    <div class="row">
     <div class="col s12 m9 l9">
       <h4 class="green-text text-accent-4">Transacción Completa</h4>
       <h5 class="grey-text">Gracias por su Compra.</h5>
       
                <h6 class="grey-text">Tu transacción se ha realizado correctamente y se te ha enviado un recibo de tu compra por correo electronico.</h6>
       </div>
     <div class="col s12 m12 l12">
       <div class="mi-card-panel white">
       <h5>Detalles de la Compra</h5>
      <table>
        <thead>
          <tr class="grey-text">
              <th data-field="envio"><h5>Informacion</h5> </th>
              <th data-field="name"><h5>Direccion de Envio</h5> </th>
              <th data-field="name"><h5>Total</h5> </th>
          </tr>
        </thead>

        <tbody>
        <tr class="grey-text text-darken-4">
          <td><strong>Compra hecha el: </strong><?php echo $datofecha['fecha_facturacion'];?><br>
              <strong>Forma de Pago:</strong> Paypal <br>
              <strong>Fecha de Pago:</strong> <?php echo $datofecha['fecha_facturacion'];?>   
        </td>
          <td><?php //echo $nombre_cliente;?><br>
              <?php //echo $direccion;?><br>
              <?php //echo $ciudad.", ".$estado.", ".$codigo_postal;?><br>
              <?php //echo $pais;?><br>
              <?php //echo $telefono;?>

          </td>
          <td style="vertical-align: none">
            <strong>Sub Total </strong><span class="">USD $<?php echo $TOTAL;?></span><br>
            <strong>Envio </strong><span class="green-text text-accent-4">NA</span><br>
            <strong>TOTAL </strong><span>USD $<?php echo $TOTAL;?></span>
          </td>
        </tr>
        </tbody>
      </table>
       </div>
     </div>
     <div class="col s12 m12 l12">
     <div class="mi-card-panel white">
      <table class="responsive-table black-text bordered white" >
        <thead>
          <tr>
          <th colspan="2" data-field="price">Articulos Comprados</th>
              <th data-field="name" class="right-align">Precio</th>
              <th data-field="name" class="right-align">Cantidad</th>         
              <th data-field="price" class="right-align">Sub Total</th> 
          </tr>
        </thead>
        <tbody>
        <?php           
              $Total=0;
              $cantidadarticulos=0;
              while($datolibros = mysql_fetch_array($rs2,MYSQL_ASSOC)){
        ?>
        <tr>
          <td><img src="<?php echo $datolibros['imagen']?>" alt="" width="100" height="125"> </td>
          <td><?php echo $datolibros['nombre'];?></td>
           <td class="right-align"><?php echo "US $".$datolibros['precio'];?></td>
           <td class="right-align " ><?php echo 1;?></td> 
           <?php $subtotal=$datolibros['precio']*1;
                 $Total=$Total+$subtotal;?>
          <td class="right-align"><?php echo "US $".$subtotal;?></td>     
          </tr>  
        <?php
            $cantidadarticulos++;
            }
        ?>
        <tr>
          <td class="right-align" colspan="5"><a href="ebooks.php" ><button class="waves-effect waves-light btn light-blue darken-4">Volver a la Tienda</button></a></td>
        </tr>
        </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>
      