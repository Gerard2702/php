<?php
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['id'])){
	header("Location:../../class/sesion/cerrarsesion.php");
}

if($_SESSION['rol']==3){
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$imagen=$_SESSION['imagen'];
/*include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();

$query="SELECT * FROM producto;";
$resp=$conn->query($query);
$num_total_registros = mysqli_num_rows($resp);

if ($num_total_registros > 0) {
	$TAMANO_PAGINA = 20;
    $pagina = false;

    if (isset($_GET["pagina"]))
    $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}

	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
	$conn->conectar();
    if(!isset($_POST['buscar'])){
	$query2="SELECT p.idproducto,p.nombre,p.descripcion,p.precio,p.estado,p.imagen,p.cantidad,e.nombre,c.categoria 
		from producto p
		inner join categoria c on c.idcategoria=p.categoria_idcategoria
		inner join empresa e on e.idempresa=p.empresa_idempresa 
		order by p.idproducto desc LIMIT ".$inicio."," . $TAMANO_PAGINA;
	}
	else{
	$query2="SELECT p.idproducto,p.nombre,p.descripcion,p.precio,p.estado,p.imagen,p.cantidad,e.nombre,c.categoria 
		from producto p
		inner join categoria c on c.idcategoria=p.categoria_idcategoria
		inner join empresa e on e.idempresa=p.empresa_idempresa 
		where p.nombre like '%".$_POST['buscar']."%' LIMIT ".$inicio.",".$TAMANO_PAGINA;	
	}
	$resp2=$conn->query($query2);
    $num = mysqli_num_rows($resp2);
}*/
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
	<link href="../../dist/general/general.css" rel="stylesheet">
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
			<li><a href="#!" id"carrito"><span class="large material-icons" >shopping_cart</span>Carrito<span class="badge">0</span></a></li>
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
			<form action="" method="POST">
				<center><span class="white-text"><strong>B&uacute;squeda</strong></span></center>
				<input placeholder="" type="text" name="buscar" class="validate white-text" required>
				<center><button class="waves-effect waves-light btn cyan darken-2" name="btnbuscar">Buscar</button></center>
			</form>	
        </div>
		<div class="collection grey darken-4">
			<center class="collection-item grey darken-4"><span class="white-text" ><strong>Categorias</strong></span></center>
			<a href="#!" class="collection-item grey darken-4 white-text selected" style="text-decoration:none; color:white;" id="general">General</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="cases">Cases</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="tarjetas">Tarjetas de Video</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="monitores">Monitores</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="memorias">Memorias</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="boards">Mother-Board</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="micros">Microprocesadores</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="perifericos">Perifericos</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="discos">Discos Duros</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="accesorios">Accesorios</a>
			<a href="#!" style="text-decoration:none; color:white;" class="collection-item grey darken-4" id="fuentes">Fuentes de Poder</a>
		</div>
	</div>
	<script src="../../dist/general/general.js"></script>
	<!-- AQUI SE MUESTRA LO QUE SE SELECCIONA EN CATEGORIAS O LA BUSQUEDA -->
	<div class="col l10 m6 s12" id="contenido">
		<div  id="opcion">
			<?php include ('general.php'); ?>
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