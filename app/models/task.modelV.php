<?php
class taskModelV {

    private function conectionDB() {
        $db = new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
        return $db;
    }

    function getCarModel() {
        // 1. abro conexión con DB
        $db = $this->conectionDB();

        // 2. ejecuto consulta SQL (SELECT * FROM vehiculos)
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
//////////
    // function used($es_nuevo) {
    //     $db = $this->conectionDB();
    //     $query = $db->prepare('SELECT * FROM vehiculos WHERE es_nuevo = 0');
    //     $query->execute([$es_nuevo]);
    // }

    // function new($es_nuevo) {
    //     $db = $this->conectionDB();
    //     $query = $db->prepare('SELECT * FROM vehiculos WHERE es_nuevo = 1');
    //     $query->execute([$es_nuevo]);
    // }

    function insertCar($modelo, $anio, $km, $precio, $patente, $imagen) {
        $db = $this->conectionDB();
        // buscar si existe
        $query = $db->prepare("SELECT id FROM vehiculos WHERE modelo = ?");
        $query->execute([$modelo]);
        $vehiculo = $query->fetch(PDO::FETCH_ASSOC);

        if ($vehiculo) {
            $id_marca = $modelo['id'];
        } else {
            // 2. Insertar nueva marca
            $insertCar = $db->prepare("INSERT INTO vehiculos (modelo, anio, km, precio, patente, imagen, vendido) VALUES (?,?,?,?,?,?,0)");
            $insertCar->execute([$modelo, $anio, $km, $precio, $patente, $imagen]);
            $id_marca = $db->lastInsertId();
        }
        return $id_marca;
    }

}
