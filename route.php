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


// parsea la acción para separar acción real de parámetros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        showHome();
        break;
    case 'marcas':
        $controler->showCarBrands();    
        break;
    case 'modelos':
        $controlerV->showCarModel();
        break;
    case 'agregar':
        $controler->insert();    
        break;
    case 'modificar':
        if (isset($params[1])) {
            $controler->edit($params[1]); // $params[1] = ID de la marca
        } else {
            $controler->showCarBrands(); // si no viene ID, volvemos al listado
        }
    break;
    case 'actualizar':
        $controler->update(); // update() recibe $_POST con id, marca, nacionalidad y anio
    break;
    case 'ver':
        if (isset($params[1])) {
            $controlerV->showCarBrandById($params[1]);
        } else {
            $controlerV->showCarModel(); 
        }
        break;
    case 'buscar':
        $controler->buscar();
        break;
    case 'vendido':
        $controlerV->sellCar($params[1]);
        break;
    case 'eliminar':
        $controler-> removeBrand($params[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Error 404! Página no encontrada...';
        break;
}

