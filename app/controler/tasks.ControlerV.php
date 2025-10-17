<?php 
    include_once 'app/models/task.modelV.php';
    include_once 'app/veiws/task.veiwV.php';

    class tasksControlerV {
        private $model;
        private $veiw;
    
    
        function __construct(){
            //instanciamos
            $this->model = new taskModelV();
            $this->veiw = new taskveiwV();
        }

        function showCarModel() {
            // obtengo los modelos de vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista
            $this->veiw->showTaksV($modelos);

        }

        function sellCar($id) {
            $this->model->updateCar($id);
            header("Location: " . BASE_URL . "modelos");
        }
//////////////////
        function showCarDetails($id) {
            // obtengo los modelos de vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista
            $this->veiw->showDetails($modelos, $id);

        }

        function usedCars($id) {
            // obtengo los modelos de vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista
            $this->veiw->noNewCars($modelos, $id);
        }

        function newCars($id) {
            // obtengo los modelos de vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista
            $this->veiw->factoryCars($modelos, $id);
        }

        
        function addCarModel() {
            $this->veiw->addCar();
            if (isset($_POST['modelo'], $_POST['anio'], $_POST['km'], $_POST['precio'], $_POST['patente'], $_POST['imagen'], $_POST['id_marca'])) {
                $modelo = trim($_POST['modelo']); // trim evita espacios accidentales
                $anio = filter_var($_POST['anio'], FILTER_VALIDATE_INT);
                $km = filter_var($_POST['km'], FILTER_VALIDATE_INT);
                $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
                $patente = strtoupper(trim($_POST['patente'])); // Ej: abc123 -> ABC123
                $imagen = $_POST['imagen'];
                $id_marca = $_POST['id_marca'];            
                $this->model->insertCar($modelo, $anio, $km, $precio, $patente, $imagen, $id_marca);
            } else {
                $this->veiw->showError('Falta ingresar datos');
            }

        //    if (empty($marca) && empty($modelo)) {
        //         $this->veiw->showError('Falta ingresar datos');
        //    } else {
        //    }
        }

    }

?>
