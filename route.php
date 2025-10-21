<?php
    require_once './app/tasks.php';
    require_once './app/controler/tasks.Controler.php';
    require_once './app/controler/tasks.ControlerV.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
//se istancian los controlers
$controler = new tasksControler();
$controlerV = new tasksControlerV();


//         TABLA DE RUTEO
//    *action*                  *function*
// home               ->        showHome()
// verVehiculos       ->      showVehiculos()
// ver_vehiculos/:id  ->     showVehiculos($id)
// eliminar/:ID       ->    deleteVehiculo($id)
// vendido/:ID        ->      sellCar($id);

session_start();
// parsea la acción para separar acción real de parámetros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        showHome();
        break;
    case 'login':
        $controlerUser->showLogin($request);
        break;
    case 'doLogin':
        $controlerUser->doLogin($request);
        break;
    case 'marcas':
        $controler->showCarBrands($request);    
        break;
    case 'modelos':
        $controlerV->showCarModel();
        break;
    case 'agregarMarca':
        // $controler->insert($request);    
        break;
    case 'modificarMarca':
        if (isset($params[1])) {
            // $controler->edit($params[1],$request); // $params[1] = ID de la marca
        } else {
            $controler->showCarBrands($request); // si no viene ID, volvemos al listado
        }
        break;
    case 'actualizarMarca':
        // $controler->update($request); // update() recibe $_POST con id, marca, nacionalidad y anio
        break;
    case 'agregarModelo':
        $controlerV->addCarModel();
        break;
    case 'ver':
        if (isset($params[1])) {
            $controler->showCarBrandById($params[1]);
        } else {
            $controler->showCarBrands();  
        }
        break;
    case 'buscarMarca':
        // $controler->buscar($request);
        break;
    case 'detallesModelo':
        $controlerV->showCarDetails($params[1]);
        break;
    case 'vendido':
        $controlerV->sellCar($params[1]);
        break;
    case 'eliminarMarca':
        $controler->removeBrand($params[1], $request);
        break;
    case 'usados':
        $controlerV->usedCars($params[0]);
        break;
    case 'nuevos':
        $controlerV->newCars($params[0]);
        break;
    case 'todos':
        $controlerV->showCarModel();
    case 'quitarModelo':
        $controlerV->eraseCar($params[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Error 404! Página no encontrada...';
        break;
}

