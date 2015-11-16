<?php
include("../../class/conexion/conexion.php");
$nombre=$_POST['nombre']; 
$descrip=$_POST['descripcion'];
$precio=$_POST['precio'];
$cant=$_POST['cantidad'];
$categ=$_POST['categoria'];
$empresa=$_POST['empresa'];
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
	header("Location:../../usuario/empresa/?err=1");
	exit();
}
else{
	$dir_destino = "../imagenes/";
    $imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
    $dirimagen= 'productos/imagenes/';
    $imagenfile = $dirimagen . basename($_FILES['imagen']['name']);
	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
		$conn = new Conexion();
		$conn->conectar();
		$query="INSERT INTO producto(nombre,descripcion,precio,estado,imagen,cantidad,empresa_idempresa,categoria_idcategoria) VALUES('$nombre','$descrip','$precio','1','$imagenfile','$cant','$empresa','$categ')";
		$conn->insert_delete_update($query);
		$conn->desconectar();
		header("Location:../../usuario/empresa/?success=1");
		exit();
	}
	else{
		header("Location:../../usuario/empresa/?err=2");
		exit();
	}
}
?>