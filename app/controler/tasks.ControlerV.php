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

        function eraseCar($id) {
            $this->model->deleteCar($id);
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
            $this->veiw->yesNewCars($modelos, $id);
        }

        function addCarModel() {
            if (isset($_POST['modelo'], $_POST['anio'], $_POST['km'], $_POST['precio'], $_POST['patente'], $_POST['marca']) && !empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['anio']) && !empty($_POST['km']) && !empty($_POST['precio'])) {
                $modelo = trim($_POST['modelo']); // trim evita espacios accidentales
                $anio = filter_var($_POST['anio'], FILTER_VALIDATE_INT);
                $km = filter_var($_POST['km'], FILTER_VALIDATE_INT);
                $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
                $patente = strtoupper(trim($_POST['patente'])); // Ej: abc123 -> ABC123
                $es_nuevo = isset($_POST['es_nuevo']) ? 1 : 0;
                $imagen = $_FILES['imagen']['name'];
                $vendido = isset($_POST['vendido']) ? 1 : 0;
                $marca = trim($_POST['marca']);
                $nacionalidad = $_POST['nacionalidad'] ?? null;
                $anio_de_creacion = $_POST['anio_de_creacion'] ?? null;
                move_uploaded_file($_FILES['imagen']['tmp_name'], 'img/uploads/' . $_FILES['imagen']['name']);
                // var_dump($marca, $modelo, $anio, $km, $precio, $patente, $imagen);
                // die();
                // echo 'estoy en addcar controler';
                $this->model->insertCar($modelo, $anio, $km, $precio, $patente, $es_nuevo, $imagen, $vendido, $marca, $nacionalidad, $anio_de_creacion);
                // printf("<script type='text/javascript'>alert('Lo estamos redireccionando'); </script>"); 
                header("Location: " . BASE_URL . "modelos");
            } else {
                $this->veiw->showError('Falta ingresar datos');
            }
        }
        
    }
    //    if (empty($marca) && empty($modelo)) {
    //         $this->veiw->showError('Falta ingresar datos');
    //    } else {
    //    }

?>
