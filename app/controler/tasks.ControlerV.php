<?php 
include_once 'app/models/task.modelV.php';
include_once 'app/veiws/task.veiwV.php';

class tasksControlerV {
    private $model;
    private $veiw;

    function __construct(){
        $this->model = new taskModelV();
        $this->veiw = new taskveiwV();
    }

    // ==== HOME ====
    // function showHomeUser($request) {
    //     $modelos = $this->model->getCarModel();
    //     $this->veiw->showTaksVehiculosUser($modelos, $request->user);
    // }

    function showHome() {
        $modelos = $this->model->getCarModel();
        $this->veiw->showTaksVehiculos($modelos);
    }

    // ==== VEHÍCULOS ====
    function showCarBrandById($id) {
        $modelos = $this->model->getVehiculosByMarca($id);
        $this->veiw->showModelosPorMarca($modelos);
    }

    function showCarDetails($id) {
        $modelos = $this->model->getCarModel();
        $this->veiw->showDetails($modelos, $id);
    }

    function usedCars($id) {
        $modelos = $this->model->getCarModel();
        $this->veiw->noNewCars($modelos, $id);
    }

    function newCars($id) {
        $modelos = $this->model->getCarModel();
        $this->veiw->yesNewCars($modelos, $id);
    }

    // ==== ACCIONES ====
    function sellCar($id) {
        $this->model->updateCar($id);
        header("Location: " . BASE_URL . "modelos");
    }

    function eraseCar($id) {
        $this->model->deleteCar($id);
        header("Location: " . BASE_URL . "modelos");
    }

    function addCarModel() {
        if (isset($_POST['modelo'], $_POST['anio'], $_POST['precio'], $_POST['patente'], $_POST['marca']) && !empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['anio']) && !empty($_POST['precio'])) {

            $modelo = trim($_POST['modelo']);
            $anio = filter_var($_POST['anio'], FILTER_VALIDATE_INT);
            $km = !empty($_POST['km']) ? filter_var($_POST['km'], FILTER_VALIDATE_INT) : null;
            $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
            $patente = !empty($_POST['patente']) ? strtoupper(trim($_POST['patente'])) : null;
            $es_nuevo = isset($_POST['es_nuevo']) ? 1 : 0;
            if ($es_nuevo == 1) {
                $km = 0;
            } elseif (empty($_POST['km']) || !is_numeric($_POST['km'])) {
                $errores[] = "Debes ingresar los kilómetros para vehículos usados";
            } else {
                $km = (int) $_POST['km'];
            }
            $imagen = null;
            if (isset($_POST['imagen']) && filter_var($_POST['imagen'], FILTER_VALIDATE_URL)) {
                $imagen = $_POST['imagen'];
            }
            $vendido = isset($_POST['vendido']) ? 1 : 0;
            $marca = trim($_POST['marca']);
            $nacionalidad = $_POST['nacionalidad'] ?? null;
            $anio_de_creacion = $_POST['anio_de_creacion'] ?? null;

            $this->model->insertCar($modelo, $anio, $km, $precio, $patente, $es_nuevo, $imagen, $vendido, $marca, $nacionalidad, $anio_de_creacion);
            header("Location: " . BASE_URL . "modelos");
        } else {
            $this->veiw->showError('Falta ingresar datos');
        }
    }
}
?>
