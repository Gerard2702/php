<?php
include("../../class/conexion/conexion.php");
$idempresa = $_POST['id'];
$conn = new Conexion();
$conn->conectar();
$query="DELETE FROM empresa WHERE id='idempresa'";
$resp=$conn->insert_delete_update($query); 
$numuser = mysqli_num_rows($resp);
header("location: empresas.php");
?>