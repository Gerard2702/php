<?php
include("../../class/conexion/conexion.php");
$id=$_GET['id'];
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM empresa WHERE idempresa='$id'";
$resp=$conn->query($query);
$conn->desconectar();
$datos=$resp->fetch_assoc();
echo'
<div class="modal-content">
<center><h6>PC-Locker<br><strong>Modificar Empresa</strong></h6></center>
	<form method="post" action="../../usuario/admin/save.php" id="formmodifempresa">
	<div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Nombre" name="nombre" type="text" value="'.$datos['nombre'].'" class="validate" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Descripci&oacute;n" name="descripcion" value="'.$datos['descripcion'].'" type="text" class="validate" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Usuario" name="usuario" type="text" value="'.$datos['usuario'].'" class="validate" step="any" required>
    </div>
    <div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Contraseña" name="pass" type="password" value="'.$datos['pass'].'" class="validate" step="any" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Correo" value="'.$datos['correo'].'" name="correo" type="email" class="validate" required>
    </div>
    <div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Telefono" value="'.$datos['telefono'].'" name="telefono" type="text" class="validate" required>
    </div>
	<input type="hidden" value="'.$id.'" name="idempresa">
	<center id="submitboton"><button class="waves-effect waves-light btn cyan darken-2" type="submit">Modificar</button></center>
	</form>
	<script>
		$("#formmodifempresa").submit(function(){
			$("#submitboton").hide().html("<img src=\'../../framework/img/loading.gif\' width=\'40\' height=\'40\'><h6 style=\'color:white;\'><h6>Actualizando Informacion . . .</h6>").fadeIn();
		});
	</script>
</div>
'
?>