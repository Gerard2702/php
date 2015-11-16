<?php
include("../class/conexion/conexion.php");
$id=$_GET['id'];
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM producto WHERE idproducto='$id'";
$resp=$conn->query($query);
$conn->desconectar();
$datos=$resp->fetch_assoc();
echo'
<div class="modal-content">
<center><h6>PC-Locker<br><strong>Modificar Producto</strong></h6></center>
	<form method="post" action="../../productos/class/modificar_producto.php" id="formmodifproducto">
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
        <input placeholder="Precio" name="precio" type="number" value="'.$datos['precio'].'" class="validate" step="any" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix">subject</i>
        <input placeholder="Cantidad de productos en inventario" value="'.$datos['cantidad'].'" name="cantidad" type="number" class="validate" required>
    </div>
	<input type="hidden" value="'.$id.'" name="idproducto">
	<center id="submitboton"><button class="waves-effect waves-light btn cyan darken-2" type="submit">Modificar producto</button></center>
	</form>
	<script>
		$("#formmodifproducto").submit(function(){
			$("#submitboton").hide().html("<img src=\'../../framework/img/loading.gif\' width=\'40\' height=\'40\'><h6 style=\'color:white;\'><h6>Actualizando Informacion . . .</h6>").fadeIn();
		});
	</script>
</div>
'
?>