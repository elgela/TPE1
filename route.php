<?php
    require_once './app/db.php';
    require_once './app/tasks.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

//         TABLA DE RUTEO
//    *action*                  *function*
// home               ->        showHome()
// verVehiculos       ->      showVehiculos()
// ver_vehiculos/:id  ->     showVehiculos($id)
// eliminar/:ID       ->    deleteVehiculo($id)
// vendido/:ID        ->      sellCar($id);


// parsea la acción para separar acción real de parámetros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        showHome();
        break;
    case 'marcas':
        showCarBrands();
        break;
    case 'modelos':
        showCarModel();
        break;
    case 'ver':
        if (isset($params[1])) {
            showCarBrandById($params[1]);
        } else {
            showCarBrands();
        }
        break;
    case 'vendido':
        sellCar($params[1]);
        break;
    case 'eliminar':
        removeBrand($params[1]);
        break;
    default:
        echo 'Error 404! Página no encontrada...';
        break;
}

