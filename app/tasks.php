<?php

////todavia no
function login() {
?>
  <div>
    <form method='POST' class="formLogin">
      <h3>Login</h3>
      <label>Usuario: </label>
      <input required type='text' name='user' placeholder='Ingrese usuario' />
      <label>Contraseña: </label>
      <input required type='password' name='password' placeholder='Ingrese contraseña' />
      <input type='submit' value='Ingresar' class="btn btn-primary" />
    </form>
  </div>
<?php }

function register() {
?>
  <form method='POST'>
    <h3>Registrarse</h3>
    <label>Nombre: <input type='text' name='nombre' placeholder='Nombre' /></label>
    <br>
    <label>Apellido: <input type='text' name='apellido' placeholder='Apellido' /></label>
    <br>
    <label>Usuario: <input type='text' name='usuario' placeholder='Usuario' /></label>
    <br>
    <label>Contraseña: <input type='password' name='contraseña' placeholder='Contraseña' /></label>
    <br>
    <input type='submit' value='Registrar' class="btn btn-primary" />
  </form>

<?php }

function showHome() {
?>
<?php
  require_once 'templates/header.php';
  login();
  // showCarBrands();
  // register();
  require_once 'templates/footer.php';
}
