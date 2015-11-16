<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<script src="framework/jquery/jquery-2.1.4.min.js"></script>
	<link href="framework/materialize/font/material-icon.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="framework/materialize/css/materialize.min.css" media="screen,projection">
	<script src="framework/materialize/js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="shortcut icon" href="framework/img/logopeq.png">
	<title>PC-Locker</title>
	<script>
	$(document).ready(function(){
		$('.modal-trigger').leanModal();
	});
	</script>
</head>
<body class="grey lighten-1">
<br><br><br>
<!-- INICIO DE SESION --> 
<div class="row">
	<div class="col s12 offset-m3 m6 offset-l3 l6">
    <div class="card-panel grey darken-4">
	<center><img src="framework/img/logopeq.png" width="120" height="100"></center>
	<center><h6 class="white-text">PC-Locker<br><strong>Iniciar Sesi&oacute;n</strong></h6></center>
	<form method="post" action="class/sesion/sesion.php">
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Usuario" id="user" name="usuario" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
        <i class="material-icons prefix white-text">https</i>
		<input placeholder="Contrase&ntilde;a" id="user" name="contrasena" type="password" class="validate white-text" required>
    </div>
	<a href="registro/registro.php"><p class="right-align cyan-text text-darken-2">Registrarse</p></a>
	<center><button class="waves-effect waves-light btn cyan darken-2" type="submit">Iniciar Sesi&oacute;n</button></center>
	</form>
	</div>
	</div>
</div>
<!-- FOOTER -->
<?php include("class/footer/footer.php"); ?>
<!-- ERROR DE INICIO DE SESION -->
<div id="error" class="modal">
    <div class="modal-content">
		<center><img src="framework/img/icons/warning.png" width="60" height="60"></center>
		<center><h5>ERROR DE USUARIO O CONTRASE&Ntilde;A</h5></center>
		<center><h6>Intente nuevamente</h6></center>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
</div>
<?php
if(isset($_GET['err'])){
	echo"
	<script>
		 $('#error').openModal();
	</script>
	";
}
?>
</body>
</html>