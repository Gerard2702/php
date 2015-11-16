<?php
include("../../class/conexion/conexion.php");
$id=$_GET['id'];
$conn = new Conexion();
$conn->conectar();
$query="DELETE FROM empresa WHERE idempresa='$id'";
if ($conn->insert_delete_update($query)){
	$conn->desconectar();
	header("Location:../../usuario/admin/?elifok=1");
	exit();
}
else{
	$conn->desconectar();
	header("Location:../../usuario/admin/?err=1");
	exit();
}

?>