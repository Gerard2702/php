function agregarcarrito(id,nombre,precio,imagen){
	$.ajax({
		type:"POST",
		url: "../../carrito/carrito.php",
		dataType:"text",
  		data:{
    	id:id,
    	nombre:nombre,
    	precio:precio,
    	imagen:imagen,
    	cantidad:1,
  		}
		}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
		});
}