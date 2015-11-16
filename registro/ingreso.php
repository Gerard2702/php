<?php
include("../class/conexion/conexion.php");
$conn = new Conexion();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$user =  $_POST['user'];
$pass = md5($_POST['password']);
//CONSULTA PARA SABER SI YA EXISTE EL USUARIO O EL CORREO
$conn->conectar();
$query="SELECT 1 FROM usuario WHERE correo='$correo' OR usuario='$user'";
$resp=$conn->query($query);
$conn->desconectar();
//SI EXISTE EL EL USUARIO
if(mysqli_num_rows($resp)!=0){
	header("Location:registro.php?err=3");
	exit();
}
//SI NO EXISTE EL USUARIO
else{
	if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
		header("Location:registro.php?err=1");
		exit();
	}
	else{
		$dir_destino = "../usuario/imagenes/";
		$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);
		$dirimagen= 'usuario/imagenes/';
		$imagenfile = $dirimagen . basename($_FILES['imagen']['name']);
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
			$conn->conectar();
			$query = "INSERT INTO USUARIO(nombre,apellido, estado, usuario, pass, imagen, correo, rol_idrol) VALUES ('$nombre','$apellido',1,'$user','$pass','$imagenfile', '$correo', 3)";
			$conn->insert_delete_update($query);
			$conn->desconectar();
			header('location:../?registro=1');
			exit();
		}
		else{
			header("Location:registro.php?err=2");
			exit();
		}
	}
}
?>