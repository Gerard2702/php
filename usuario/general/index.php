<?php
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['id'])){
	header("Location:../../class/sesion/cerrarsesion.php");
}
if($_SESSION['rol']==3){
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
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
	<title>PC-Locker</title>
	<script>
	$(document).ready(function(){
		$(".button-collapse").sideNav();
		$('#drop').dropdown();
	});
	</script>
</head>
<body class="grey lighten-1">
<!-- NAVBAR DE USUARIO -->
<nav>
    <div class="nav-wrapper grey darken-4">
		<a href="#!" class="brand-logo"><img src="../../framework/img/logonav.png" class="responsive-img" width="120" height="90"></a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a href="#"><span class="large material-icons">shopping_cart</span> Carrito<span class="badge">0</span></a></li>
			<li><a id="drop" data-activates='dropdown1' href="#"><span class="material-icons">call_received</span><?php echo $nombre." ".$apellido; ?></a></li>
			<ul id='dropdown1' class='dropdown-content grey darken-4'>
				<li><center><img src="../../<?php echo $imagen;?>" width="150" height="150"></center></li>
				<li class="divider"></li>
				<li><a href="../../class/sesion/cerrarsesion.php" class="cyan-text text-darken-2 center-align">Cerrar Sesi&oacute;n</a></li>				
			</ul>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li><center><img src="../../<?php echo $imagen;?>" width="150" height="150"></center></li>
			<li><a href="#"><span class="large material-icons">shopping_cart</span> Carrito<span class="badge">0</span></a></li>
			<li><a href="../../class/sesion/cerrarsesion.php">Cerrar Sesi&oacute;n</a></li>
		</ul>
    </div>
</nav>
<!-- CONTENIDO DE LA PAGINA -->  
<div class="row">
	<div class="col l2 m6 s12">
		<div class="card-panel grey darken-4">
				<center><span class="white-text"><strong>B&uacute;squeda</strong></span></center>
				<input placeholder="" type="text" class="validate white-text" required>
				<center><button class="waves-effect waves-light btn cyan darken-2">Buscar</button></center>
        </div>
		<div class="collection grey darken-4">
			<center class="collection-item grey darken-4"><span class="white-text" ><strong>Categorias</strong></span></center>
			<a href="#!" class="collection-item grey darken-4" style="text-decoration:none; color:white; border-right: 8px solid #29CAE5;">CAT 1</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4">CAT 2</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4">CAT 3</a>
		</div>
	</div>
	<!-- AQUI SE MUESTRA LO QUE SE SELECCIONA EN CATEGORIAS O LA BUSQUEDA -->
	<div class="col l10 m6 s12">
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