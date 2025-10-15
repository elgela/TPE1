<?php

// funcion que conecta a la DB
function conectionDB2() {
  return new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
}
                // ya echo mvc (si)
// Obtiene y devuelve la base de datos de las marcas
// function getCarBrands() {
//   // 1. abro conexión con la DB
//   $db = conectionDB();

//   // 2. ejecuto la consulta SQL (SELECT * FROM marcas)
//   $query = $db->prepare('SELECT * FROM marcas');
//   $query->execute();

//   // obtengo todos los resultados de la consulta que arroja la query
//   $marcas = $query->fetchAll(PDO::FETCH_OBJ);

//   return $marcas;
// }

                // ya echo mvc (si)
// function getCarBrandById($id) {
//   // 1. Abrimos la conexión a la DB
//   $db = conectionDB2();

//   // 2. Enviamos la consulta SQL ('SELECT * FROM marcas WHERE id = ?')
//   $query = $db->prepare('SELECT * FROM marcas WHERE id = ?');
//   $query->execute([$id]);

//   // Obtengo los datos de la consulta que arroja la query
//   $brandById = $query->fetchAll(PDO::FETCH_OBJ);

//   return $brandById;
// }


              // ya echo mvc (si)
// function getCarModel() {
//   // 1. abro conexión con DB
//   $db = conectionDB2();

//   // 2. ejecuto consulta SQL (SELECT * FROM vehiculos)
//   $query = $db->prepare('SELECT * FROM vehiculos');
//   $query->execute();

//   // obtengo todos los resultados de la consulta que arroja la query
//   $models = $query->fetchAll(PDO::FETCH_OBJ);

//   return $models;
// }


                // ya echo mvc (si)
// function deleteBrand($id) {
//   // 1. abro la conexión con la DB
//   $db = conectionDB2();
//   // 2. Envío la consulta
//   $query = $db->prepare("DELETE FROM marcas WHERE id = ?");
//   $query->execute([$id]); // evita la inyección SQL
//   // no hace falta obtener el resultado
// }


                // ya echo mvc (si)
// function updateCar($id) {
//   $db = conectionDB2();
//   $query = $db->prepare('UPDATE vehiculos SET vendido = 1 WHERE id = ?');
//   $query->execute([$id]);
// }
