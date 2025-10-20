<?php
    require_once 'app/middlewares/guard.middleware.php';
    require_once 'app/middlewares/session.middleware.php';

    require_once './app/controler/tasks.Controler.php';
    require_once './app/controler/tasks.ControlerV.php';
    require_once 'app/controler/user.controler.php';
    
$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');




//se istancian los controlers
$controler = new tasksControler();
$controlerV = new tasksControlerV();
$controlerUser = new userController();

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

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);


switch ($params[0]) {
    case 'home':
        $controlerV->showHome();
        // $controlerV->showHome($request);
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
        $controlerV->showHome();
        // $controlerV->showHome($request);
        break;
    case 'agregarMarca':
        $controler->insert($request);    
        break;
    case 'modificarMarca':

        if (isset($params[1])) {
            $controler->edit($params[1],$request); // $params[1] = ID de la marca
        } else {
            $controler->showCarBrands($request); // si no viene ID, volvemos al listado
        }
    break;
    case 'actualizarMarca':
        $controler->update($request); // update() recibe $_POST con id, marca, nacionalidad y anio
    break;
    case 'ver':
        if (isset($params[1])) {
            $controlerV->showCarBrandById($params[1]);
        } else {
            $controlerV->showHome($request); 
        }
        break;
    case 'buscarMarca':
        $controler->buscar($request);
        break;
    case 'vendido':
        $controlerV->sellCar($params[1]);
        break;
    case 'eliminarMarca':
        $controler-> removeBrand($params[1],$request);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Error 404! Página no encontrada...';
        break;
}

