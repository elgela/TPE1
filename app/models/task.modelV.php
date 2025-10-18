<?php 
    require_once 'app/confic/confic.php';
    class taskModelV{

        private function conectionDB() {
            $db = new PDO("mysql:host=" . HOST .";dbname=" . DBNAME . ";charset=utf8",USER,PASS);
            return $db;
        }


        function getCarModel() {
            // 1. abro conexión con DB
            $db =$this-> conectionDB();

            // 2. ejecuto consulta SQL (SELECT * FROM vehiculos)
            $query = $db->prepare('SELECT * FROM vehiculos');
            $query->execute();

            // obtengo todos los resultados de la consulta que arroja la query
            $models = $query->fetchAll(PDO::FETCH_OBJ);

            return $models;
        }


        function getVehiculosByMarca($id_marca) {
            // 1. abro conexión con DB
            $db =$this-> conectionDB();

            // 2. ejecuto consulta SQL (SELECT * FROM vehiculos)
            $query = $db->prepare('SELECT * FROM vehiculos WHERE id_marca = ?');
            $query->execute([$id_marca]);

            // obtengo todos los resultados de la consulta que arroja la query
            $models = $query->fetchAll(PDO::FETCH_OBJ);

            return $models;
        }


        function updateCar($id) {
            $db = $this-> conectionDB();
            $query = $db->prepare('UPDATE vehiculos SET vendido = 1 WHERE id = ?');
            $query->execute([$id]);
        }

    }

?>