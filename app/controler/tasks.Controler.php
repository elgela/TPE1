<?php 
    include_once 'app/models/task.model.php';
    include_once 'app/veiws/task.veiw.php';

    class tasksControler {

        private $model; 
        private $veiw;

        function __construct(){
            $this->model = new taskModel();
            $this->veiw = new taskVeiw();
        }


        function showCarBrands() {
            // obtengo las marcas de la db/arry de datos
            $marcas = $this->model->getCarBrands(); 

            
            //actualizo la vista / lo muestro
            $this->veiw->showTaks($marcas);

        }

        function showCarBrandById($id) {

            // obtengo modelos by id/trae arry de viculso con id =?
            $marcas = $this->model-> getCarBrandById($id);

            // 3. Mostrar los datos obtenidos
            $this->veiw->showTaks($marcas); 
        }

        function removeBrand($id) {
            //borro la marca que del id que pase
            $this->model->deleteBrand($id);

            //redirijo al inicio
            header('Location: ' . BASE_URL);
        }
    }

?>