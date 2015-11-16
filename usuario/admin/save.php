<?php
include("../../class/conexion/conexion.php");
$nombre=$_POST['nombre']; 
$descrip=$_POST['descripcion']; 
$telefono=$_POST['telefono']; 
$correo=$_POST['correo']; 
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$contra = md5($pass);
$idempresa=$_POST['idempresa'];
$conn = new Conexion();
$conn->conectar();
$query="UPDATE empresa SET nombre='$nombre', descripcion='$descrip', telefono='$telefono', correo='$correo', usuario='$usuario', pass='$contra' WHERE idempresa='$idempresa' ";
if ($conn->insert_delete_update($query)){
	$conn->desconectar();
	header("Location:../../usuario/admin/?modifok=1");
	exit();
}
else{
	$conn->desconectar();
	header("Location:../../usuario/admin/?modiferr=1");
	exit();
}

?>