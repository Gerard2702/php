<?php 
include("../class/conexion/conexion.php");
$idcompra=$_GET['id'];
$empresa=$_GET['empresa'];
echo'
<div class="modal-content">
';
$conn = new Conexion();
$conn->conectar();
$query="SELECT producto.nombre,producto.imagen,detalle_compra.precio,detalle_compra.cantidad FROM producto,detalle_compra WHERE detalle_compra.compra_idcompra=$idcompra AND producto.empresa_idempresa=$empresa AND detalle_compra.producto_idproducto = producto.idproducto ";
$resp=$conn->query($query);
$conn->desconectar();
if(mysqli_num_rows($resp)==0){
	echo'
	<center><img src="../../framework/img/icons/warning.png" width="60" height="60"></center>
	<center><h6>No existen ordenes de compra</h6></center>
	';
}
else{
	echo'
	<center><h6>Detalle de orden de compra</h6></center>
	<ul class="collection">
	';
	while($deta=$resp->fetch_assoc()){
		$nombre=$deta['nombre'];
		$imagen=$deta['imagen'];
		$precio=$deta['precio'];
		$cantidad=$deta['cantidad'];
		echo"
		<li class='collection-item avatar'>
			<img src='../../$imagen' alt='' class='circle'>
			<span class='title'>$nombre</span>
			<p>Precio: $precio<br>
			Cantidad: $cantidad
			</p>
			<a href='#!' class='secondary-content'><i class='material-icons'>credit_card</i></a>
		</li>
		";
	}
	echo'
	</ul>
	';
}
echo'
</div>
';
?>