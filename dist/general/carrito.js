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
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
        $.ajax({
        type:"POST",
		url: "../../carrito/carrito.php",
		dataType:"text",
		data:{
    	id2:id,
    	cantidad2:$("#cantidadnew"+id).val(),
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}