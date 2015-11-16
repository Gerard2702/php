$("#Users").click(function(){
	$("#Users").addClass("selected");
	$("#EmpresaAdd").removeClass("selected");
	$("#Empresas").removeClass("selected");
	$("#Product").removeClass("selected");
	$.ajax({
		url: "../../usuario/admin/usuarios.php"
	}).done(function(data) {
		$("#central").hide().html(data).fadeIn();
	});
});
$("#EmpresaAdd").click(function(){
	$("#EmpresaAdd").addClass("selected");
	$("#Users").removeClass("selected");
	$("#Empresas").removeClass("selected");
	$("#Product").removeClass("selected");
	$.ajax({
		url: "../../usuario/admin/agregarempresa.php"
	}).done(function(data) {
		$("#central").hide().html(data).fadeIn();
	});
});
$("#Empresas").click(function(){
	$("#Empresas").addClass("selected");
	$("#Users").removeClass("selected");
	$("#EmpresaAdd").removeClass("selected");
	$("#Product").removeClass("selected");
	$.ajax({
		url: "../../usuario/admin/empresas.php"
	}).done(function(data) {
		$("#central").hide().html(data).fadeIn();
	});
});
$("#Product").click(function(){
	$("#Product").addClass("selected");
	$("#Users").removeClass("selected");
	$("#EmpresaAdd").removeClass("selected");
	$("#Empresas").removeClass("selected");	
	$.ajax({
		url: "../../usuario/admin/productos.php"
	}).done(function(data) {
		$("#central").hide().html(data).fadeIn();
	});
});