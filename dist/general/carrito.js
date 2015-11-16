$('#comenzarcompra').click(function(){
		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../usuario/general/general.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});

/*$('#actualizar').click(function(){

		$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../carrito/carrito.php",
		dataType:"text",
		data:{
    	id2:$("#id2").val(),
    	cantidad2:$("#cantidad2").val(),
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
});*/

function actualizarCantidad(id)
{
	var cantidad2 = $("#cantidadnew"+id).val();
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../carrito/carrito.php",
		dataType:"text",
		data:{
    	id2:id,
    	cantidadnew:cantidad2 ,
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}

function eliminarArticulo(id){
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../carrito/carrito.php",
		dataType:"text",
		data:{
    	id3:id,
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}

function continuarComprando(){
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../usuario/general/general.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}

function procederPago(){
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../carrito/confirmarcarrito.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}

function confirmarCompra(){
	alert("aqui se completaria la compra");
	var redir="../../usuario/general/detallecompra.php";
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../dist/general/guardarcompra.php",
		dataType:"text",
		data:{
    	confirmar:"confirmar",
  		}
		}).done(function(data) {
		$("#opcion").hide().html(redir).fadeIn();
		});

		/*$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
		url: "../../carrito/confirmarcarrito.php"
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});*/
}