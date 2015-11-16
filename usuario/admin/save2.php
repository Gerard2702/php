<?php
include("../../class/conexion/conexion.php");
$nombre=$_POST['nombre']; 
$apellido=$_POST['apellido']; 
$correo=$_POST['correo']; 
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$contra = md5($pass);
$idusuario=$_POST['idusuario'];
$conn = new Conexion();
$conn->conectar();
$query="UPDATE usuario SET nombre='$nombre', apellido='$apelliod', correo='$correo', usuario='$usuario', pass='$contra' WHERE idusuario='$idusuario' ";
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