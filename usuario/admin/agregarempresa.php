<div class="card-panel grey darken-4">
	<center><img src="../../framework/img/logopeq.png" width="120" height="100"></center>
	<center><h6 class="white-text">PC-Locker<br><strong>Registro de Empresas</strong></h6></center>
	<form method="post" action="guardarregistro.php">
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Nombre Empresa" id="nombre" name="nombre" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Descripcion" id="descripcion" name="descripcion" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">email</i>
        <input placeholder="Correo" id="correo" name="correo" type="email" class="validate white-text" required>
    </div>
	<div class="input-field">
		<i class="material-icons prefix white-text">person_pin</i>
        <input placeholder="Usuario" id="user" name="user" type="text" class="validate white-text" required>
    </div>
	<div class="input-field">
        <i class="material-icons prefix white-text">https</i>
		<input placeholder="Contrase&ntilde;a" id="pass" name="pass" type="password" class="validate white-text" required>
    </div>
    <div class="input-field">
		<i class="material-icons prefix white-text">phone</i>
        <input placeholder="Telefono" id="telefono" name="telefono" type="text" class="validate white-text" required>
    </div>
	<div class="file-field input-field">
      <div class="waves-effect waves-light btn cyan darken-2">
        <span>Archivo</span>
        <input type="file" name="imagen" placeholder="Selecionar Imagen" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate white-text" type="text">
      </div>
    </div>
	<br>
	<center><button class="waves-effect waves-light btn cyan darken-2" type="submit">Registrar</button></center>
	</form>
	</div>