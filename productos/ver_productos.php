<?php
session_start();
include("../class/conexion/conexion.php");
$empresa=$_SESSION['id'];
echo'
<div class="card-panel grey darken-4">
';
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM producto WHERE empresa_idempresa='$empresa'";
$resp=$conn->query($query);
$conn->desconectar();
if(mysqli_num_rows($resp)==0){
	echo'
	<div class="row">
	<center><img src="../../framework/img/icons/warning.png" width="60" height="60"></center>
	<center><h6 class="white-text">No tienes productos registrados</h6></center>
	';
}
else{
	echo'
	<div class="row" style="height:600px; overflow-y:auto;">
	<script>
	 $(".materialboxed").materialbox();
	</script>
	<table class="responsive-table white-text">
	<thead>
		<tr>
			<td><center>Imagen</center></td>
			<td><center>Nombre</center></td>
			<td><center>Descripci&oacute;n</center></td>
			<td><center>Precio</center></td>
			<td><center>Cantidad</center></td>
		</tr>
	</thead>
	<tbody>
	';
	while($data=$resp->fetch_assoc()){
	$nombre=$data['nombre'];
	$descrip=$data['descripcion'];
	$precio=$data['precio'];
	$imagen=$data['imagen'];
	$cantidad=$data['cantidad'];
	echo'
	<tr>
		<td><center><img src="../../'.$imagen.'"  width="40" height="50" class="materialboxed"></center></td>
		<td><center><p><strong>'.$nombre.'</strong></p></center></td>
		<td><center><p>'.$descrip.'</p></center></td>
		<td><center><p>$'.$precio.'</p></center></td>
		<td><center><p>'.$cantidad.'</p></center></td>
	</tr>
	';
	}
	echo'
	</tbody>
	</table>
	';
}
echo'
</div>
</div>
';
?>