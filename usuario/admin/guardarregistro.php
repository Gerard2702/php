<?php
include("../../class/conexion/conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$correo = $_POST['correo'];
$usuario = $_POST['user'];
$contra = $_POST['pass'];
$contra2 = md5($contra);
$telefono = $_POST['telefono'];
$imagen="usuario/imagenes/noimagen.png";

$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO empresa(nombre, descripcion, usuario, pass, imagen, telefono, correo, estado, rol_idrol) values('$nombre', '$descripcion', '$usuario', '$contra2', '$imagen', '$telefono', '$correo', 1, 2)";
$resp=$conn->insert_delete_update($query); 
header("location: index.php");
?>