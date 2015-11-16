<?php 
session_start();

if(isset($_POST['confirmar'])){
include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();

$idusuario = $_SESSION['id'];

$micarrito=$_SESSION['carrito'];
$fecha_facturacion = date("Y-m-d");
$query = "INSERT into compra(fecha_compra,usuario_idusuario) values ('$fecha_facturacion','','$idusuario');";
$rsfac = $conn->insert_delete_update($query);
$idfac = mysqli_insert_id($conn);

$_SESSION['facturacion']= $idfac;
for($i=0;$i<count($micarrito);$i++){   
  if($micarrito[$i]!=NULL){ 
    $idebook = $micarrito[$i]['id'];
    $cantidad = $micarrito[$i]['cantidad'];
    $precio = $micarrito[$i]['precio'];
    $sqldetalle = "INSERT INTO detalle_compra(compra_idcompra,producto_idproducto,cantidad,precio) values ('$idfac','$idebook','$cantidad','$precio')";
    $rsdetalle= $conn->insert_delete_update($sqldetalle);
    }
  }

unset($_SESSION['carrito']);
unset($_SESSION['cancarrito']);
}

?>