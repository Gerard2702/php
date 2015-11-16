<?php
session_start();
include("../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();

if(isset($_POST['id'])){
  $id=$_POST['id'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $imagen = $_POST['imagen'];
  $cantidad = $_POST['cantidad'];
  $micarrito[]= array('id' => $id ,'nombre'=>$nombre,'precio'=>$precio,'imagen'=>$imagen,'cantidad'=>$cantidad);
}

if(isset($_SESSION['carrito'])){
  $micarrito=$_SESSION['carrito'];
  if(isset($_POST['id'])){
  $id=$_POST['id'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $imagen = $_POST['imagen'];
  $cantidad = $_POST['cantidad'];
  $pos=-1;
  for($i=0;$i<count($micarrito);$i++){
    if($id==$micarrito[$i]['id']){
      $pos=$i;
    }
  }
  if($pos!=-1){
    $cant=$micarrito[$pos]['cantidad']+$cantidad;
   $micarrito[$pos]= array('id' => $id ,'nombre'=>$nombre,'precio'=>$precio,'imagen'=>$imagen,'cantidad'=>$cant);
  }
  else
  {
    $micarrito[]= array('id' => $id ,'nombre'=>$nombre,'precio'=>$precio,'imagen'=>$imagen,'cantidad'=>$cantidad);
  }
  //$micarrito[]= array('id' => $id ,'nombre'=>$nombre,'precio'=>$precio,'imagen'=>$imagen,'cantidad'=>$cantidad);
  }
}
if(isset($_POST['id2'])){
  $indice=$_POST['id2'];
  $cantidad2 = $_POST['cantidad2'];
  $micarrito[$indice]['cantidad']=$cantidad2;
}

if(isset($_POST['id3'])){
  $indice=$_POST['id3'];
  $micarrito[$indice]=NULL;
}

if(isset($micarrito)) {
  $_SESSION['carrito']=$micarrito;
$cantidadcarrito=0;
  for($i=0;$i<count($micarrito);$i++){   
  if($micarrito[$i]!=NULL){ 
    $cantidadcarrito++;
  }
  }
$_SESSION['cancarrito']=$cantidadcarrito;
}
//unset($_SESSION['carrito']);
?>
<script src="../../dist/general/carrito.js"></script>
<div class="card-panel grey darken-4">
    <div class="row">
     <div class="col s12 m12 l12">
       <h5 class="white-text">Carrito de Compras</h5>
     </div>
     <div class="col s12 m9 l9">
     <div class="mi-card-panel white">
      <table class="responsive-table black-text bordered white" >
      <?php if(isset($micarrito) && $_SESSION['cancarrito']!=0){?>
        <thead>
          <tr>
          <th data-field="price"></th>
              <th data-field="nombre"></th>
              <th data-field="name" class="right-align">Precio</th>
              <th colspan="1" data-field="name" class="right-align">Cantidad</th> 
              <th data-field="nombre"></th>           
              <th data-field="price" class="right-align">Sub Total</th>
              <th data-field="eliminar"></th>  
          </tr>
        </thead>
        <tbody>
        <?php
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
           <td class="right-align " >
            <form>
              <input class="center-align" type="hidden" id="id2" value="<?php echo $i;?>">
              <input  class="center-align " type="number" id="cantidad2" size="2" maxlength="2" value="<?php echo $micarrito[$i]['cantidad'];?>" required>               
           </td>
           <td class="center-align"><a id="actualizar" class="btn-floating cyan darken-2" title="Actualizar"><i class="material-icons">replay</i></a></td>  
           </form>
           <?php $subtotal=$micarrito[$i]['precio']*$micarrito[$i]['cantidad'];
                 $Total=$Total+$subtotal;?>
          <td class="right-align"><?php echo "US $".$subtotal;?></td> 
          <td class="right-align">
            <form action="" method="POST">
              <input type="hidden" value="<?php echo $i;?>" name="id3">
              <button class="mi-btn-flat white" title="Eliminar"><i class="material-icons grey-text">close</i></button>  
            </form>
          </td>    
          </tr>  
        <?php
            $cantidadarticulos++;
            }
          }
        } 
        ?>
        <tr><td colspan="7" class="right-align">Sub Total( <?php echo $cantidadarticulos?> Articulos): <?php echo "US $".$Total;?>
        <br><strong class="red-text">Gastos de Envio: <?php echo "US $".$envio=0.00;?></strong>
        <br><strong class="red-text">Total a Pagar: <?php echo "US $".$Total; $_SESSION['totallibros']=$Total;?></strong>
        </td>
        </tr>
        <tr>
          <td colspan="5" class="right-align"><a href="ebooks.php">
          <button class="waves-effect waves-light btn white micolor-text center-align ">Continuar Comprando</button>
          </a></td>
          <td colspan="2" class="right-align">
            <form action="confirmarebooks.php" method="POST">
              <a title="Tramitar" type="submit" id="proceder_pagar"  class="waves-effect waves-light btn cyan darken-2">
                Proceder a Pagar
              </a>
            </form>
          </td>
        </tr>
        </tbody>
        <?php } else{?>
        <h5 class="red-text">Tu carro de compras está vacío, pero no tiene por qué estarlo.</h5> 
        <p>
        Haz que tu carrito de compra sea útil: llénala de productos, hay muchos productos únicos que pueden ser tuyos.
        Busca el botón "Agregar al carro de compras" para comenzar a comprar.
        </p>
            <a href="#!" title="continuar comprando" type="button" id="comenzarcompra"  class="waves-effect waves-light btn  cyan darken-2">
              Comienza a comprar Ahora
            </a>
        <?php }?>
      </table>
      </div>
      </div>
      <?php if(isset($micarrito) && $_SESSION['cancarrito']!=0){?>
      <div class="col s13 m3 l3">
        <div class="row">
      <div class="col s12 m12">
        <div class="mi-card-panel white">
          <div class="row">
          <strong>Total ( <?php if(isset($micarrito) && $_SESSION['cancarrito']!=0){echo $cantidadarticulos;} else {echo "0";}?> Articulos)</strong><br>
          <strong class="red-text"><?php if(isset($micarrito) && $_SESSION['cancarrito']!=0){echo "US $".$Total;} else{ echo "US 0.00";}?></strong>
          </div>
          <div class="row"> 
          <?php if(isset($micarrito) && $_SESSION['cancarrito']!=0){ ?>
            <form action="confirmarebooks.php" method="POST">
              <button title="Tramitar" type="submit" name="tramitar"  class="col s12 waves-effect waves-light btn light-blue darken-4">
                Tramitar
              </button>
            </form>
            <?php } else {?>
             <form action="confirmarebooks.php" method="POST">
              <button disabled title="Tramitar" type="submit" name="tramitar"  class=" col s12 waves-effect waves-light btn light-blue darken-4">
                Tramitar
              </button>
            </form>
            <?php } ?>
            <br>
            <br>
            <a href="ebooks.php"><button class="col s12 waves-effect waves-light btn white micolor-text center-align" style="font-size:12px;">Seguir Comprando</button>
            </a>
          </div>
        </div>
      </div>
    </div>
      </div>
      <?php } ?>
    </div>
  </div>
