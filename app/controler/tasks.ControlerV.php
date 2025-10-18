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

        function showCarModel() {
            
            // obtengo los modelos/vehiculos
            $modelos = $this->model->getCarModel();

            //actualizo la vista
            $this-> veiw-> showTaksV($modelos);

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
