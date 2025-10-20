<?php 
    include_once 'app/models/task.modelV.php';
    include_once 'app/veiws/task.veiwV.php';
    class tasksControlerV{
        private $model;
        private $veiw;
    
    
        function __construct(){
            //instanciamos
            $this->model = new taskModelV();
            $this->veiw = new taskveiwV();
        }

        function showHomeUser($request) {
            
            // obtengo los modelos/vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista no funciona demomento
            $this-> veiw-> showTaksVehiculosUser($modelos , $request->user);

        }

        function showHome() {
            
            // obtengo los modelos/vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista no funciona demomento
            $this-> veiw-> showTaksVehiculos($modelos);

        }

        function sellCar($id) {
            $this->model->updateCar($id);
            header("Location: " . BASE_URL . "modelos");
        }


        function showCarBrandById($id) {
            
            $modelos = $this->model->getVehiculosByMarca($id);

            $this->veiw->showModelosPorMarca($modelos);
        }
    
    }

?>
