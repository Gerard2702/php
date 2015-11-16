<?php
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['id'])){
	header("Location:../../class/sesion/cerrarsesion.php");
}
include("../../class/conexion/conexion.php");
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
		$('select').material_select();
		$('.modal-trigger').leanModal();
	});
	</script>
</head>
<body class="grey lighten-1">
<!-- NAVBAR DE EMPRESA -->
<nav>
    <div class="nav-wrapper grey darken-4">
		<a href="index.php" class="brand-logo"><img src="../../framework/img/logonav.png" class="responsive-img" width="120" height="90"></a>
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
			<a href="#!" class="collection-item grey darken-4 white-text" id="sel4">Ordenes de compra</a>
		</div>
	</div>
	<script src="../../dist/empresa/empresa.js"></script>
	<!-- AQUI SE MUESTRA LO QUE SE SELECCIONA EN EL MENU -->
	<div class="col l10 m6 s12">
		<div  id="opcion">
			<?php include ('../../productos/ver_productos_2.php'); ?>
		</div>
	</div>
</div>
<!-- MODAL PARA MODIFICAR PRODUCTOS -->
<div id="modificarproducto" class="modal">
</div>
<!-- ERROR DE CREACION DE PRODUCTO -->
<div id="errorproduct" class="modal">
    <div class="modal-content">
		<center><img src="../../framework/img/icons/warning.png" width="60" height="60"></center>
		<center><h6>ERROR DE CREACION DE PRODUCTO</h6></center>
		<center><h6>Intente nuevamente</h6></center>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
</div>
<!-- PRODUCTO CREADO CORRECTAMENTE -->
<div id="correctoproduct" class="modal">
    <div class="modal-content">
		<center><img src="../../framework/img/icons/confirmation.png" width="60" height="60"></center>
		<center><h6>EL PRODUCTO SE HA CREADO CORRECTAMENTE</h6></center>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
</div>
<!-- PRODUCTO MODIFICADO CORRECTAMENTE -->
<div id="correctomodifproduct" class="modal">
    <div class="modal-content">
		<center><img src="../../framework/img/icons/confirmation.png" width="60" height="60"></center>
		<center><h6>EL PRODUCTO SE HA MODIFICADO CORRECTAMENTE</h6></center>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
</div>
<?php
if(isset($_GET['err'])){
	echo"
	<script>
		 $('#errorproduct').openModal();
	</script>
	";
}
if(isset($_GET['success'])){
	echo"
	<script>
		 $('#correctoproduct').openModal();
	</script>
	";
}
if(isset($_GET['modifok'])){
	echo"
	<script>
		 $('#correctomodifproduct').openModal();
	</script>
	";
}
?>
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