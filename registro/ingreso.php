<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$user =  $_POST['user'];
$pass = md5($_POST['password']);
$imagen = $_POST['imagen'];

$conn = mysqli_connect("localhost", "root", "", "pclocker");

$query = "INSERT INTO USUARIO(nombre,apellido, estado, usuario, pass, imagen, correo, rol_idrol) VALUES ('$nombre','$apellido',1,'$user','$pass','$imagen', '$correo', 3)";

mysqli_query($conn,$query);
header('location:/index.php');

?>