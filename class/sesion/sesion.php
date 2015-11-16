<?php 
  try{
	$usuario=$_POST['usuario'];
	$contrasena1=$_POST['contrasena'];
	$contrasena=md5($contrasena1);
	include("../conexion/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$query="SELECT * FROM usuario WHERE usuario='$usuario' AND pass='$contrasena'";
	$resp=$conn->query($query);
	if(mysqli_num_rows($resp)==0){
		$query="SELECT * FROM empresa WHERE usuario='$usuario' AND pass='$contrasena'";
		$resp=$conn->query($query);
		$user=$resp->fetch_assoc();
		$conn->desconectar();
	}
	else{
		$user=$resp->fetch_assoc();
		$conn->desconectar();
	}
	if($user['rol_idrol']==1){
	//SESION DE USUARIO ADMINISTRADOR
	session_start();
	$_SESSION['id']=$user['idusuario'];
	$_SESSION['nombre']=$user['nombre'];
	$_SESSION['apellido']=$user['apellido'];
	$_SESSION['estado']=$user['estado'];
	$_SESSION['usuario']=$user['usuario'];
	$_SESSION['imagen']=$user['imagen'];
	$_SESSION['correo']=$user['correo'];
	$_SESSION['rol']=$user['rol_idrol'];
	header("Location:../../usuario/admin/");
	exit();
	}
	else if($user['rol_idrol']==2){
	//SESION DE USUARIO EMPRESA
	session_start();
	$_SESSION['id']=$user['idempresa'];
	$_SESSION['nombre']=$user['nombre'];
	$_SESSION['descripcion']=$user['descripcion'];
	$_SESSION['usuario']=$user['usuario'];
	$_SESSION['imagen']=$user['imagen'];
	$_SESSION['correo']=$user['correo'];
	$_SESSION['telefono']=$user['telefono'];
	$_SESSION['estado']=$user['estado'];
	$_SESSION['rol']=$user['rol_idrol'];
	header("Location:../../usuario/empresa/");
	exit();
	}
	else if($user['rol_idrol']==3){
	//SESION DE USUARIO GENERAL
	session_start();
	$_SESSION['id']=$user['idusuario'];
	$_SESSION['nombre']=$user['nombre'];
	$_SESSION['apellido']=$user['apellido'];
	$_SESSION['estado']=$user['estado'];
	$_SESSION['usuario']=$user['usuario'];
	$_SESSION['imagen']=$user['imagen'];
	$_SESSION['correo']=$user['correo'];
	$_SESSION['rol']=$user['rol_idrol'];
	header("Location:../../usuario/general/");
	exit();
	}
	else{
	header("Location:../../?err=1");
	exit();
	}
  }
  catch(Exception $e){
  header("Location:../../?err=2");
  exit();
  }
?>