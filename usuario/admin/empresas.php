<?php
include("../../class/conexion/conexion.php");
echo'
<div class="card-panel grey darken-4">
<div class="row">
';
$conn = new Conexion();
$conn->conectar();
$query="SELECT * FROM empresa";
$resp=$conn->query($query); 
$conn->desconectar();
if(mysqli_num_rows($resp)==0){
  echo'
  <center><img src="../../framework/img/icons/warning.png" width="60" height="60"></center>
  <center><h6 class="white-text">No tienes productos registrados</h6></center>
  ';
}
else{
  echo'
  <table class="responsive-table white-text">
  <thead>
    <tr>
      <td><center>Imagen</center></td>
      <td><center>Nombre</center></td>
      <td><center>Descripci&oacute;n</center></td>
      <td><center>Usuario</center></td>
      <td><center>Correo</center></td>
      <td><center>Telefono</center></td>
      <td><center>Modificar</center></td>
    </tr>
  </thead>
  <tbody>
  ';
  $count=1;
  while($data=$resp->fetch_assoc()){
  $id=$data['idempresa'];
  $nombre=$data['nombre'];
  $descrip=$data['descripcion'];
  $usuario=$data['usuario'];
  $imagen=$data['imagen'];
  $telefono=$data['telefono'];
  $correo=$data['correo'];
  echo'
  <tr>
    <td><center><img src="../../'.$imagen.'"  width="40" height="50"></center></td>
    <td><center><p><strong>'.$nombre.'</strong></p></center></td>
    <td><center><p>'.$descrip.'</p></center></td>
    <td><center><p>'.$usuario.'</p></center></td>
    <td><center><p>'.$correo.'</p></center></td>
    <td><center><p>'.$telefono.'</p></center></td>
    <td><center><button class="btn-floating waves-effect waves-light" title="Modificar" id="modificar'.$count.'"><i class="material-icons white-text">settings</i></button>
    <button class="btn-floating waves-effect waves-light" title="Eliminar" id="eliminar'.$count.'"><i class="material-icons white-text">close</i></button></center></td>
  </tr>
  ';
  echo"
  <script>
    $('#modificar$count').click(function(){
      $('#modificarempresa').openModal();
      $('#modificarempresa').html(\"<div class='modal-content'><center><img src='../../framework/img/loading.gif' width='40' height='40'><h6>Cargando Informacion . . .</h6></center></div>\");
      $.get( '../../usuario/admin/modificarempresa.php', { id:'$id'} )
        .done(function( data ) {
        $('#modificarempresa').html(data).fadeIn();
      });
    });
$('#eliminar$count').click(function(){
      $.get( '../../usuario/admin/eliminar.php', { id:'$id'} )
	  .done(function() {
      });
    });
  </script>
  ";
  $count++;
  }
  echo'
  </tbody>
  </table>
  ';
}
echo'
</div>
</div>
';