<?php 
	session_start();
	$empresa=$_SESSION['id'];
	include("../class/conexion/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$query="SELECT compra.idcompra,compra.fecha_compra,usuario.nombre,usuario.apellido,usuario.correo FROM usuario, compra,detalle_compra,producto WHERE compra.usuario_idusuario=usuario.idusuario AND detalle_compra.producto_idproducto=producto.idproducto AND producto.empresa_idempresa='$empresa' GROUP BY compra.idcompra";
	$resp=$conn->query($query);
	$conn->desconectar();
	echo'
	<div class="card-panel grey darken-4">
	<div class="row">
	';
	if(mysqli_num_rows($resp)==0){
		echo'
		<center><img src="../../framework/img/icons/warning.png" width="60" height="60"></center>
		<center><h6 class="white-text">No Existen Ordenes de Compra</h6></center>
		';
	}
	else{
		echo'
		<table class="responsive-table white-text">
		<thead>
			<tr>
				<td><center>Id Compra</center></td>
				<td><center>Fecha de compra</center></td>
				<td><center>Usuario de compra</center></td>
				<td><center>Correo de usuario</center></td>
				<td><center>Detalles de compra</center></td>
			</tr>
		</thead>
		<tbody>
		';
		while($oc=$resp->fetch_assoc()){
			$id=$oc['idcompra'];
			$fecha=$oc['fecha_compra'];
			$nombre=$oc['nombre'];
			$apellido=$oc['apellido'];
			$correo=$oc['correo'];
			echo'
			<tr>
				<td><center>'.$id.'</center></td>
				<td><center>'.$fecha.'</center></td>
				<td><center>'.$nombre.' '.$apellido.'</center></td>
				<td><center>'.$correo.'</center></td>
				<td><center><button class="btn-floating waves-effect waves-light" title="Detalles"><i class="material-icons white-text">settings</i></button></center></td>
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