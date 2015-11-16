<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<script src="../framework/jquery/jquery-2.1.4.min.js"></script>
	<link href="../framework/materialize/font/material-icon.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../framework/materialize/css/materialize.min.css" media="screen,projection">
	<script src="../framework/materialize/js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="shortcut icon" href="../framework/img/logopeq.png">
	<title>PC-Locker</title>
</head>
<body class="grey lighten-1">
<br>
<!-- REGISTRO DE USUARIOS --> 
<div class="row">
	<div class="col s12 offset-m3 m6 offset-l3 l6">
    <div class="card-panel grey darken-4">
	<center><img src="../framework/img/logopeq.png" width="120" height="100"></center>
	<center><h6 class="white-text">PC-Locker<br><strong>Registro</strong></h6></center>
	<form type="post" action="#">
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Nombre" id="nombre" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Apellido" id="apellido" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">email</i>
        <input placeholder="Correo" id="correo" type="email" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Usuario" id="user" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
        <i class="material-icons prefix white-text">https</i>
		<input placeholder="Contrase&ntilde;a" id="user" type="password" class="validate white-text" required>
    </div>
	<div class="file-field input-field">
      <div class="waves-effect waves-light btn cyan darken-2">
        <span>Archivo</span>
        <input type="file" name="imagen" placeholder="Selecionar Imagen" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate white-text" type="text">
      </div>
    </div>
	<br>
	<center><button class="waves-effect waves-light btn cyan darken-2" type="submit">Registrarse</button></center>
	</form>
	</div>
	</div>
</div>
<!-- FOOTER -->
<?php include("../class/footer/footer.php"); ?>
</body>
</html