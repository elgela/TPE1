<?php
// require_once './app/db.php';

                // ya echo mvc (si)
// function showCarBrands() {
//   require_once 'templates/header.php';

//   // obtengo las marcas
//   $marcas = getCarBrands();

//   require_once 'templates/table_brands.php';
// }


                // ya echo mvc (si)
//marcas
// function removeBrand($id) {
//   deleteBrand($id);
//   header('Location: ' . BASE_URL);
// }


        // ya echo mvc (si)
// function sellCar($id) {
//   updateCar($id);
//   header("Location: " . BASE_URL . "modelos");
// }


            // ya echo mvc (si)
// function showCarModel() {
//   require_once 'templates/header.php';

//   // obtengo los modelos
//   $modelos = getCarModel();

//   require_once 'templates/table_models.php';
//   require_once 'templates/footer.php';
// }


                // ya echo mvc (si)
// //marcas ++++
// function showCarBrandById($id) {
//   require_once 'templates/header.php';
//   // obtengo modelos by id
//   $marcas = getCarBrandById($id);

//   // 3. Mostrar los datos obtenidos
  
//   require_once 'templates/table_brands.php';
//   require_once 'templates/footer.php';
// }




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
  register();
  require_once 'templates/footer.php';
}
