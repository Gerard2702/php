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
	<table class="responsive-table white-text">
	<thead>
		<tr>
			<td><center>Imagen</center></td>
			<td><center>Nombre</center></td>
			<td><center>Descripci&oacute;n</center></td>
			<td><center>Precio</center></td>
			<td><center>Cantidad</center></td>
			<td><center>Modificar</center></td>
		</tr>
	</thead>
	<tbody>
	';
	$count=1;
	while($data=$resp->fetch_assoc()){
	$id=$data['idproducto'];
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
		<td><center><button class="btn-floating waves-effect waves-light" title="Modificar" id="modificar'.$count.'"><i class="material-icons white-text">settings</i></button></center></td>
	</tr>
	';
	echo"
	<script>
		$('#modificar$count').click(function(){
			$('#modificarproducto').openModal();
			$('#modificarproducto').html(\"<div class='modal-content'><center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando Informacion . . .</h6></center></div>\");
			$.get( '../../productos/modificar_productos_campos.php', { id:'$id'} )
				.done(function( data ) {
				$('#modificarproducto').html(data).fadeIn();
			});
		});
	</script>
	";
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