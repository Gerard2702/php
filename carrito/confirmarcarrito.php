<?php
session_start();
include("../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();

if(isset($_SESSION['id'])){
$idusuario = $_SESSION['id'];
$nombre_cliente=$_SESSION['nombre']." ".$_SESSION['apellido'];
$correo= $_SESSION['correo'];


}
else{
  header("location:login.php");
}

 
?>
<script src="../../dist/general/carrito.js"></script>
  <div class="card-panel grey darken-4">
    <div class="row">
     <div class="col s12 m12 l12">
       <h5 class="white-text">Completar Transacción</h5>
       <h5 class="grey-text">Verificar detalles de compra.</h5>
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
          </td>
          <td style="vertical-align: none">
            <img src="" alt="logo">
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
              <button title="Tramitar" type="submit" onclick="confirmarCompra()" name="funcion"  value="ConfirmarCompra"class="waves-effect waves-light btn  cyan darken-2">
                Confirmar
              </button>
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>
      