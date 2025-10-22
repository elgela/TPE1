<?php
    // require_once './app/tasks.php';
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
// $request = (new SessionMiddleware())->run($request);


switch ($params[0]) {

    // --- HOME ---
    case 'home':
        $controlerV->showHome();
        break;

    // --- LOGIN ---
    case 'login':
        $controlerUser->showLogin($request);
        break;

    case 'doLogin':
        $controlerUser->doLogin($request);
        break;

    // --- MARCAS ---
    case 'marcas':
        $controler->showCarBrands();
        break;

    case 'agregarMarca':
        $controler->insert($request);    
        break;

    case 'modificarMarca':
        if (isset($params[1])) {
            $controler->edit($params[1],$request); // $params[1] = ID de la marca
        } else {
            $controler->showCarBrands();
        }
        break;

    case 'actualizarMarca':
        $controler->update($request); // update() recibe $_POST con id, marca, nacionalidad y anio
        break;
    case 'agregarModelo':
        $controlerV->addCarModel();
        break;
    case 'insertarModelo':
        $controlerV->addCarModel();
        break;

    case 'ver':
        if (isset($params[1])) {
            // $controlerV->showCarBrandById($params[1]);
        } else {
            $controlerV->showCarDetails($params[1]); 
        }
        break;
    case 'buscarMarca':
        $controler->buscar($request);
        break;

    case 'detallesModelo':
    case 'detalles':
        if (isset($params[1])) {
            $controlerV->showCarDetails($params[1]);
        } else {
            echo "Falta el ID del auto.";
        }
        break;

    case 'vendido':
        if (isset($params[1])) {
            $controlerV->sellCar($params[1]);
        } else {
            echo "Falta el ID para marcar como vendido.";
        }
        break;

    case 'quitarModelo':
    case 'quitar':
        if (isset($params[1])) {
            $controlerV->eraseCar($params[1]);
        } else {
            echo "Falta el ID del auto a quitar.";
        }
        break;

    case 'usados':
        $controlerV->usedCars($params[0]);
        break;

    case 'nuevos':
        $controlerV->newCars($params[0]);
        break;

    case 'modelos':
        $controlerV->showHome();
        break;

    // --- ERROR 404 ---
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Error 404! Página no encontrada...';
        break;
}

// switch ($params[0]) {
//     case 'home':
//         showHome();
//         break;
//     case 'login':
//         $controlerUser->showLogin($request);
//         break;
//     case 'doLogin':
//         $controlerUser->doLogin($request);
//         break;
//     case 'marcas':
//         $controler->showCarBrands($request);    
//         break;
//     case 'modelos':
//         $controlerV->showCarModel();
//         break;
//     case 'agregarMarca':
//         // $controler->insert($request);    
//         break;
//     case 'modificarMarca':
//         if (isset($params[1])) {
//             // $controler->edit($params[1],$request); // $params[1] = ID de la marca
//         } else {
//             $controler->showCarBrands($request); // si no viene ID, volvemos al listado
//         }
//         break;
//     case 'actualizarMarca':
//         // $controler->update($request); // update() recibe $_POST con id, marca, nacionalidad y anio
//         break;
//     case 'agregarModelo':
//         $controlerV->addCarModel();
//         break;
//     case 'ver':
//         if (isset($params[1])) {
//             $controlerV->showCarBrandById($params[1]);
//         } else {
//             $controlerV->showHome($request); 
//         }
//         break;
//     case 'buscarMarca':
//         // $controler->buscar($request);
//         break;
//     case 'detallesModelo':
//         $controlerV->showCarDetails($params[1]);
//         break;
//     case 'vendido':
//         $controlerV->sellCar($params[1]);
//         break;
//     case 'eliminarMarca':
//         $controler->removeBrand($params[1], $request);
//         break;
//     case 'usados':
//         $controlerV->usedCars($params[0]);
//         break;
//     case 'nuevos':
//         $controlerV->newCars($params[0]);
//         break;
//     case 'todos':
//         $controlerV->showCarModel();
//     case 'quitarModelo':
//         $controlerV->eraseCar($params[1]);
//         break;
//     default:
//         header("HTTP/1.0 404 Not Found");
//         echo 'Error 404! Página no encontrada...';
//         break;
// }

