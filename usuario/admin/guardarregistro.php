<?php
include("../../class/conexion/conexion.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$correo = $_POST['correo'];
$usuario = $_POST['user'];
$contra = $_POST['pass'];
$contra2 = md5($contra);
$telefono = $_POST['telefono'];
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
	header("Location:../../usuario/admin/?err=1");
	exit();
}
else{
	$dir_destino = "../../usuario/imagenes/";
    $imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
    $dirimagen= 'usuario/imagenes/';
    $imagenfile = $dirimagen . basename($_FILES['imagen']['name']);
	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
		$conn = new Conexion();
		$conn->conectar();
		$query = "INSERT INTO empresa(nombre, descripcion, usuario, pass, imagen, telefono, correo, estado, rol_idrol) values('$nombre', '$descripcion', '$usuario', '$contra2', '$imagenfile', '$telefono', '$correo', '1', '2')";
		$conn->insert_delete_update($query);
		$conn->desconectar();
		header("Location:../../usuario/admin/?success=1");
		exit();
	}
	else{
		header("Location:../../usuario/admin/?err=2");
		exit();
	}
}
?>	