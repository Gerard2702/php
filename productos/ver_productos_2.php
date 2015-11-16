<?php
$empresa=$_SESSION['id'];
echo'
<div class="card-panel grey darken-4">
<div class="row">
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
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM producto WHERE empresa_idempresa='$empresa'";
$resp=$conn->query($query);
$conn->desconectar();
if(mysqli_num_rows($resp)==0){
}
else{
	while($data=$resp->fetch_assoc()){
	$nombre=$data['nombre'];
	$descrip=$data['descripcion'];
	$precio=$data['precio'];
	$imagen=$data['imagen'];
	$cantidad=$data['cantidad'];
	echo'
	<tr>
		<td><center><img src="../../'.$imagen.'"  width="40" height="50"></center></td>
		<td><center><p><strong>'.$nombre.'</strong></p></center></td>
		<td><center><p>'.$descrip.'</p></center></td>
		<td><center><p>$'.$precio.'</p></center></td>
		<td><center><p>'.$cantidad.'</p></center></td>
	</tr>
	';
	}
}
echo'
</tbody>
</table>
</div>
</div>
';
?>