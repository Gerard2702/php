$("#sel1").click(function(){
	$("#sel1").addClass("activamenu");
	$("#sel2").removeClass("activamenu");
	$("#sel3").removeClass("activamenu");
	$("#sel4").removeClass("activamenu");
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
	$.ajax({
		url: "../../productos/ver_productos.php"
	}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
	});
});
$("#sel2").click(function(){
	$("#sel2").addClass("activamenu");
	$("#sel1").removeClass("activamenu");
	$("#sel3").removeClass("activamenu");
	$("#sel4").removeClass("activamenu");
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
	$.ajax({
		url: "../../productos/ingresar_productos.php"
	}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
	});
});
$("#sel3").click(function(){
	$("#sel3").addClass("activamenu");
	$("#sel1").removeClass("activamenu");
	$("#sel2").removeClass("activamenu");
	$("#sel4").removeClass("activamenu");
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
	$.ajax({
		url: "../../productos/modificar_productos.php"
	}).done(function(data) {
		$("#opcion").hide().html(data).fadeIn();
	});
});
$("#sel4").click(function(){
	$("#sel4").addClass("activamenu");
	$("#sel1").removeClass("activamenu");
	$("#sel2").removeClass("activamenu");
	$("#sel3").removeClass("activamenu");
	$("#opcion").html("<center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando . . .</h6></center>");
	$("#opcion").hide().load("../../productos/orden_compra.php").fadeIn();
});