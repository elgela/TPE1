<?php
class taskModelV {


    private function conectionDB() {
        $db = new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
        return $db;
    }

    function getCarModel() {
        // 1. abro conexión con DB
        $db = $this->conectionDB();

        // 2. consulta SQL (SELECT * FROM vehiculos)
        $query = $db->prepare('SELECT * FROM vehiculos');
        $query->execute();

        // obtengo todos los resultados de la consulta que arroja la query
        $models = $query->fetchAll(PDO::FETCH_OBJ);

        return $models;
    }
    
    function updateCar($id) {
        $db = $this->conectionDB();
        $query = $db->prepare('UPDATE vehiculos SET vendido = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    function deleteCar($id) {
        $db = $this->conectionDB();
        $query = $db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

    function insertCar($modelo, $anio, $km, $precio, $patente, $es_nuevo, $imagen, $vendido, $marca, $nacionalidad, $anio_de_creacion) {
        $db = $this->conectionDB();

        // 1. Verificar si la marca ya existe
        $query = $db->prepare("SELECT id FROM marcas WHERE marca = ?");
        $query->execute([$marca]);
        $resultadoMarca = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultadoMarca) {
            $id_marca = $resultadoMarca['id'];
        } else {
            // 2. Insertar nueva marca
            $insertMarca = $db->prepare("INSERT INTO marcas(marca, nacionalidad, anio_de_creacion) VALUES (?,?,?)");
            $insertMarca->execute([$marca, $nacionalidad, $anio_de_creacion]);
            $id_marca = $db->lastInsertId();
        }

        // 3. Insertar vehículo
        $insertVehiculo = $db->prepare("INSERT INTO vehiculos(modelo, anio, km, precio, patente, es_nuevo, imagen, vendido, id_marca) VALUES (?,?,?,?,?,?,?,?,?)");
        $insertVehiculo->execute([$modelo, $anio, $km, $precio, $patente, $es_nuevo, $imagen, $vendido, $id_marca]);
    }

}

