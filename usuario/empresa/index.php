<?php
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['id'])){
	header("Location:../../class/sesion/cerrarsesion.php");
}
if($_SESSION['rol']==2){
$nombre=$_SESSION['nombre'];
$imagen=$_SESSION['imagen'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<script src="../../framework/jquery/jquery-2.1.4.min.js"></script>
	<link href="../../framework/materialize/font/material-icon.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../../framework/materialize/css/materialize.min.css" media="screen,projection">
	<script src="../../framework/materialize/js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="shortcut icon" href="../../framework/img/logopeq.png">
	<link href="../../dist/empresa/empresa.css" rel="stylesheet">
	<title>PC-Locker</title>
	<script>
	$(document).ready(function(){
		$(".button-collapse").sideNav();
		$('#drop').dropdown();
	});
	</script>
</head>
<body class="grey lighten-1">
<!-- NAVBAR DE EMPRESA -->
<nav>
    <div class="nav-wrapper grey darken-4">
		<a href="#!" class="brand-logo"><img src="../../framework/img/logonav.png" class="responsive-img" width="120" height="90"></a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a id="drop" data-activates='dropdown1' href="#"><span class="material-icons">call_received</span><?php echo $nombre; ?></a></li>
			<ul id='dropdown1' class='dropdown-content grey darken-4'>
				<li><center><img src="../../<?php echo $imagen;?>" width="150" height="150"></center></li>
				<li class="divider"></li>
				<li><a href="../../class/sesion/cerrarsesion.php" class="cyan-text text-darken-2 center-align">Cerrar Sesi&oacute;n</a></li>				
			</ul>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li><center><img src="../../<?php echo $imagen;?>" width="150" height="150"></center></li>
			<li><a href="../../class/sesion/cerrarsesion.php">Cerrar Sesi&oacute;n</a></li>
		</ul>
    </div>
</nav>
<!-- CONTENIDO DE LA PAGINA -->  
<div class="row">
	<div class="col l2 m6 s12">
		<div class="collection grey darken-4">
			<center class="collection-item grey darken-4"><span class="white-text" ><strong>Menu</strong></span></center>
			<a href="#!" class="collection-item grey darken-4 white-text activamenu" id="sel1">Ver productos</a>
			<a href="#!" class="collection-item grey darken-4 white-text" id="sel2">Ingresar producto</a>
			<a href="#!" class="collection-item grey darken-4 white-text" id="sel3">Modificar producto</a>
		</div>
	</div>
	<script src="../../dist/empresa/empresa.js"></script>
	<!-- AQUI SE MUESTRA LO QUE SE SELECCIONA EN EL MENU -->
	<div class="col l10 m6 s12">
		<div class="card-panel" id="opcion">
			
		</div>
	</div>
</div>
<!-- FOOTER -->
<?php include("../../class/footer/footer.php"); ?>
</body>
</html>
<?php 
}
else{
	header("Location:../../class/sesion/cerrarsesion.php");
	exit();
}
?>