<?php

    require_once 'app/confic/confic.php';
    class taskModel{
        //coneccion a la D
        private function conectionDB() {    
            $db = new PDO("mysql:host=" . HOST .";dbname=" . DBNAME . ";charset=utf8",USER,PASS);

            return $db;
        }

        // Obtiene y devuelve la base de datos de las marcas
        function getCarBrands() {
            // 1. abro conexión con la DB
            $db = $this->conectionDB();

            // 2. ejecuto la consulta SQL (SELECT * FROM marcas)
            $query = $db->prepare('SELECT * FROM marcas');
            $query->execute();

            // obtengo todos los resultados de la consulta que arroja la query
            $marcas = $query->fetchAll(PDO::FETCH_OBJ);

        return $marcas;
        }

        // Obtiene y devuelve la base de datos de las marcas con el id  (cambiar incuerencia)
        function getCarBrandById($id) {
            // 1. Abrimos la conexión a la DB
            $db = $this-> conectionDB();

            // 2. Enviamos la consulta SQL ('SELECT * FROM marcas WHERE id = ?')
            $query = $db->prepare('SELECT * FROM marcas WHERE id = ?');
            $query->execute([$id]);

            // Obtengo los datos de la consulta que arroja la query
            $brandById = $query->fetchAll(PDO::FETCH_OBJ);

            return $brandById;
        }

        function deleteBrand($id) {
            // 1. abro la conexión con la DB
            $db = $this-> conectionDB();

            // 2. Envío la consulta
            $query = $db->prepare("DELETE FROM marcas WHERE id = ?");
            $query->execute([$id]); // evita la inyección SQL
            
            // no hace falta obtener el resultado
        }
    }

?> 