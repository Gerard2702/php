$('#carrito').click(function(){
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../carrito/carrito.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

 $("#buscarproducto").submit(function(event){ 
 	event.preventDefault(); 
	var nombrebuscar = $("#buscarp").val();
	$('#general').removeClass("selected");
		$('#cases').addClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscarnombre:nombrebuscar,
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
 });


$('#general').click(function(){
		$('#general').addClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../usuario/general/general.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#cases').click(function(){
		$('#general').removeClass("selected");
		$('#cases').addClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Cases",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#tarjetas').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').addClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Tarjetas de Video",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#monitores').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').addClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Monitores",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#memorias').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').addClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Memorias",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#boards').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').addClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Mother-Board",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#micros').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').addClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Microprocesadores",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#perifericos').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').addClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Perifericos",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#discos').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').addClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Discos Duros",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#accesorios').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').addClass("selected");
		$('#fuentes').removeClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Accesorios",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

$('#fuentes').click(function(){
		$('#general').removeClass("selected");
		$('#cases').removeClass("selected");
		$('#tarjetas').removeClass("selected");
		$('#monitores').removeClass("selected");
		$('#memorias').removeClass("selected");
		$('#boards').removeClass("selected");
		$('#micros').removeClass("selected");
		$('#perifericos').removeClass("selected");
		$('#discos').removeClass("selected");
		$('#accesorios').removeClass("selected");
		$('#fuentes').addClass("selected");
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		type:"POST",
		url: "../../usuario/general/general.php",
		dataType:"text",
  		data:{
    	buscar:"Fuentes de Poder",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});



