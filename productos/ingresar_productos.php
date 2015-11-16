<?php
session_start();
include("../class/conexion/conexion.php");
$empresa=$_SESSION['id'];
echo'
	<script>
	$("select").material_select();
	</script>
    <div class="card-panel grey darken-4">
	<center><h6 class="white-text">PC-Locker<br><strong>Ingresar Nuevo Producto</strong></h6></center>
	<form method="post" action="../../productos/class/ingreso_bd.php" id="formproducto" enctype="multipart/form-data">
	<div class="input-field">
		<i class="material-icons prefix white-text">subject</i>
        <input placeholder="Nombre" name="nombre" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">subject</i>
        <input placeholder="Descripci&oacute;n" name="descripcion" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">subject</i>
        <input placeholder="Precio" name="precio" type="number" class="validate white-text" step="any" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">subject</i>
        <input placeholder="Cantidad de productos en inventario" name="cantidad" type="number" class="validate white-text" required>
    </div>
	<div class="input-field">
		<select class="browser-default"name="categoria" required>
			<option value="" disabled selected >Seleccione una categoria</option>
    ';
	$conn = new Conexion();
	$conn->conectar();
	$query="SELECT * FROM categoria";
	$resp=$conn->query($query);
	$conn->desconectar();
	while($cat=$resp->fetch_assoc()){
		$idcat=$cat['idcategoria'];
		$categoria=$cat['categoria'];
		echo'
		<option value="'.$idcat.'">'.$categoria.'</option>
		';
	}
echo'
		</select>
	</div>	
	<div class="file-field input-field">
      <div class="waves-effect waves-light btn cyan darken-2">
        <span>Archivo</span>
        <input type="file" name="imagen" accept="image/*" placeholder="Selecionar Imagen" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate white-text" type="text">
      </div>
    </div>
	<br>
	<input name="empresa" type="hidden" value="'.$empresa.'">
	<center id="submitboton"><button class="waves-effect waves-light btn cyan darken-2" type="submit">Guardar producto</button></center>
	</form>
	</div>
	<script>
		$("#formproducto").submit(function(){
			$("#submitboton").hide().html("<img src=\'../../framework/img/loading.gif\' width=\'40\' height=\'40\'><h6 style=\'color:white;\'>Guardando . . .</h6>").fadeIn();
		});
	</script>
';
?>