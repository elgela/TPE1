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


        function showCarBrandsUser($request) {
            // obtengo las marcas de la db/arry de datos
            $marcas = $this->model->getCarBrands(); 

            
            //actualizo la vista / lo muestro no funciona demomento
            $this->veiw->showTaks($marcas,$request->user);
        }

        function showCarBrands() {
            // obtengo las marcas de la db/arry de datos
            $marcas = $this->model->getCarBrands(); 

            
            //actualizo la vista / lo muestro no funciona demomento
            $this->veiw->showTaks($marcas);

        }

        function showCarBrandById($id,$request) {
            // obtengo modelos by id/trae arry de viculso con id =?
            $marca = $this->model-> getCarBrandById($id);

            // 3. Mostrar los datos obtenidos
            $this->veiw->showTaksById($marca,$request); 
        }

        function buscar($request) {
            if (isset($_POST['marca']) && !empty($_POST['marca'])) {
                $nombre = trim($_POST['marca']);

                $marca = $this->model->getCarBrandByName($nombre);

                $this->veiw->showTaksById($marca,$request);
            } else {
                // Si no se ingresó nada, muestro todas
                $marcas = $this->model->getCarBrands();
                $this->veiw->showTaks($marcas,$request);
                // $this->veiw->showError("no se logro encontrar");
            }
        }

        function removeBrand($id,$request) {
            //borro la marca que del id que pase
            $this->model->deleteBrand($id);

            //redirijo al inicio
                $marcas = $this->model->getCarBrands();
                $this->veiw->showTaks($marcas,$request);
        }


        function insert($request){
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $marca = $_POST['marca'] ?? null;
                $nacionalidad = $_POST['nacionalidad'] ?? null;
                $anio = $_POST['anio'] ?? null;
                
                if (!empty($marca) && !empty($nacionalidad) && !empty($anio)) {
                    $this->model->insertBrand($marca, $nacionalidad, $anio);
                }
            }

                $marcas = $this->model->getCarBrands();
                $this->veiw->showTaks($marcas,$request);
            
        }

        function edit($id,$request) {
            
            // Traer la marca desde el modelo
            $marca = $this->model->getCarBrandById($id);

            // Pasar esos datos a la vista para precargar el formulario
            $this->veiw->showEditForm($marca,$request);
        }

        function update($request) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'] ?? null;
                $marca = $_POST['marca'] ?? null;
                $nacionalidad = $_POST['nacionalidad'] ?? null;
                $anio = $_POST['anio'] ?? null;

                if ($id && $marca && $nacionalidad && $anio) {
                    $this->model->updateBrand($id, $marca, $nacionalidad, $anio);

                    //actualizo
                    $marcas = $this->model->getCarBrands();
                    $this->veiw->showTaks($marcas,$request);
                } else {
                    $this->veiw->showError("no se pudo actualizar");
                }
            }
        }
    }

?>