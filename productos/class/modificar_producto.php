<?php
include("../../class/conexion/conexion.php");
$nombre=$_POST['nombre']; 
$descrip=$_POST['descripcion']; 
$precio=$_POST['precio']; 
$cant=$_POST['cantidad']; 
$idproducto=$_POST['idproducto'];
$conn = new Conexion();
$conn->conectar();
$query="UPDATE producto SET nombre='$nombre', descripcion='$descrip', precio='$precio',cantidad='$cant' WHERE idproducto='$idproducto' ";
if ($conn->insert_delete_update($query)){
	$conn->desconectar();
	header("Location:../../usuario/empresa/?modifok=1");
	exit();
}
else{
	$conn->desconectar();
	header("Location:../../usuario/empresa/?modiferr=1");
	exit();
}

?>
