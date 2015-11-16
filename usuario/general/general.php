<?php 
include("../../class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();

/*$query="SELECT * FROM producto;";
$resp=$conn->query($query);
$num_total_registros = mysqli_num_rows($resp);

if ($num_total_registros > 0) {
	$TAMANO_PAGINA = 3;
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
	$conn->conectar();*/
    if(isset($_POST['buscar'])){
	
		$query2="SELECT p.idproducto,p.nombre,p.descripcion,p.precio,p.estado,p.imagen,p.cantidad,c.categoria 
		from producto p
		inner join categoria c on c.idcategoria=p.categoria_idcategoria
		where c.categoria like '%".$_POST['buscar']."%' order by p.idproducto desc";
	}
	else if(isset($_POST['buscarnombre'])){
		
		$query2="SELECT p.idproducto,p.nombre,p.descripcion,p.precio,p.estado,p.imagen,p.cantidad,c.categoria 
		from producto p
		inner join categoria c on c.idcategoria=p.categoria_idcategoria
		where p.nombre like '%".$_POST['buscarnombre']."%' order by p.idproducto desc";	
	}
	else{
		$query2="SELECT p.idproducto,p.nombre,p.descripcion,p.precio,p.estado,p.imagen,p.cantidad,c.categoria 
		from producto p
		inner join categoria c on c.idcategoria=p.categoria_idcategoria
		order by p.idproducto desc";
	}
	$resp2=$conn->query($query2);
    $num = mysqli_num_rows($resp2);


?>
<script src="../../dist/general/general.js"></script>
<div class="card-panel grey darken-4">
	<div class="row">
	<?php if($num >0){ ?>
	<?php  
	$count=1;
	while($producto = mysqli_fetch_array($resp2,MYSQL_ASSOC)){ ?>			
		<div class="card grey darken-4 col s12 l3 m3" >
            <div class="center-align">
              <img src="<?php echo "../../".$producto['imagen'];?>" alt="" height="200" width="200">
            </div>
			<div class="card-content" id="info<?php echo $count;?>">
			<center><a href="#" class="cyan-text text-darken-2" id="vermas<?php echo $count;?>">Ver Informacion</a></center>
			</div>
            <div class="card-content" id="descri<?php echo $count;?>">
              <span class="white-text" style="font-size:20px;"><?php echo $producto['nombre'];?></span><br>
              <span class="white-text" ><?php echo $producto['descripcion'];?></span><br>
              <span class="white-text" ><?php echo "$".$producto['precio'];?></span><br>
			  <center><a href="#" class="cyan-text text-darken-2" id="vermass<?php echo $count;?>">Ocultar</a></center>
            </div>
			<script>
				$(document).ready(function(){
					$('#descri<?php echo $count;?>').hide();
				});
				$('#vermas<?php echo $count;?>').click(function(){
					$('#info<?php echo $count;?>').hide();
					$('#descri<?php echo $count;?>').slideDown(2000);
				});
				$('#vermass<?php echo $count;?>').click(function(){
					$('#descri<?php echo $count;?>').hide();
					$('#info<?php echo $count;?>').slideDown(2000);
				});
			</script>
            <div class="card-action">
              <center><a class="waves-effect waves-light btn cyan darken-2 white-text" id="agregarcarrito" 
              onclick="agregarcarrito('<?php echo $producto['idproducto'];?>','<?php echo $producto['nombre'];?>','<?php echo $producto['precio'];?>','<?php echo $producto['imagen'];?>')">
              + Carrito</a></center>
            </div>
		</div>
	<?php  
	$count++;
	}//fin del mientras que recorre resultados
         ?>	
	</div>
</div>		
	<?php } else{  ?>
		
	<?php } ?>



