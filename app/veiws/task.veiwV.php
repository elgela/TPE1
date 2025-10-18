<?php
class taskveiwV {

    function showTaksV($modelos) {
        require_once 'templates/header.phtml';
?>
        <form class="form-modelos">
            <h2>MODELOS</h2>
            <nav class="navBar">
                <ul>
                    <li><a href="nuevos">0 Km.</a></li>
                    <li><a href="usados">Usados</a></li>
                </ul>
            </nav>
            <!-- <h3>Seleccione la marca</h3> -->
            <div>
                <button type="submit" class="btn btn-info">Ordenar</button> <input type="text" name="buscar" id="" placeholder="Ordenar por marca">
            </div>
            <br>
            <div>
                <a href="agregar"><input type="button" value="Agregar vehículo" class="btn btn-outline-info"></a>
                <!-- <button type="submit" class="btn btn-outline-info" name="agregar">Agregar vehículo</button> -->
            </div>
            <div class="modelos">
                <?php foreach ($modelos as $modelo) { ?>
                    <section>
                        <h4><?php echo $modelo->modelo ?></h4>
                        <a href="<?php echo $modelo->imagen ?>"><img src="<?php echo $modelo->imagen ?>" alt="imagen del modelo"></a>
                        <h6><?php echo 'Modelo ' . $modelo->anio ?></h6>
                        <!-- <h6><?php echo $modelo->patente ?></h6> -->
                        <!-- <h5><?php echo number_format($modelo->km, 0, '.', '.') . ' km.' ?></h5> -->
                        <h2><?php echo '$ ' . number_format($modelo->precio, 0, ',', '.'); ?></h2>
                        <?php if (!$modelo->vendido) { ?><a href="vendido/<?php echo $modelo->id ?>" type="button" name="comprar" class="btn btn-danger">Comprar</a> <?php }
                        if ($modelo->vendido) {
                            ?><a href="quitar/<?php echo $modelo->id ?>" type="button" name="eliminar" class="btn btn-danger">Quitar</a> 
                            <h1>¡Vendido!</h1>
                        <?php
                        } else {
                        ?><a href="detalles/<?php echo $modelo->id ?>" type="button" name="detalles" class="btn btn-danger">Detalles</a>
                        <?php } ?>
                        <br>
                    </section>
                <?php } ?>
            </div>
        </form>
    <?php
        require_once 'templates/footer.phtml';
    }

    function showDetails($modelos, $id) {
        require_once 'templates/header.phtml';
    ?>
        <h2>Detalles</h2>
        <div class="detalles">
            <?php
            // Busco el modelo correspondiente al ID
            $modelo = null;
            foreach ($modelos as $carModel) {
                if ($carModel->id == $id) {
                    $modelo = $carModel;
                    break;
                }
            }

            if ($modelo) {
                // Muestro los detalles del modelo
            ?>
                <input type="button" value="Volver" class="btn btn-primary" onclick="history.back()">

                <h1><?= $modelo->modelo ?> </h1>
                <h5>Año: <?= $modelo->anio ?></h5>
                <h5><?= number_format($modelo->km, 0, '.', '.') ?> km</h5>
                <?php if ($modelo->patente): ?>
                    <h5>Patente: <?= $modelo->patente ?></h5>
                <?php endif ?>
                <h2>Precio: $<?= number_format($modelo->precio, 0, ',', '.') ?></h2>
                <img src="<?= $modelo->imagen ?>" alt="Imagen de <?= $modelo->modelo ?>">
            <?php
            } else {
            ?>
                <p>Modelo no encontrado</p>
            <?php } ?>
        </div>
    <?php
        require_once 'templates/footer.phtml';
    }

    function noNewCars($modelos) {
        require_once 'templates/header.phtml';
    ?>
        <h1>Autos usados</h1>
        <nav class="navBar">
            <ul>
                <li><a href="nuevos">0 Km.</a></li>
                <li><a href="usados">Usados</a></li>
            </ul>
        </nav>
        
        <?php
            require_once 'templates/form-marcas.phtml';
        ?>

        <div class="usados">
            <?php
            // Muestro los modelos usados
            foreach ($modelos as $modelo) {
                if ($modelo->es_nuevo === 0) {
                    // Muestro el modelo
                    include 'templates/section-details.phtml';
                }
            }
            ?>
        </div>

    <?php
        require_once 'templates/footer.phtml';
    }

    function yesNewCars($modelos) {
        require_once 'templates/header.phtml';
    ?>
        <h1>Autos 0Km</h1>
        <nav class="navBar">
            <ul>
                <li><a href="nuevos">0 Km.</a></li>
                <li><a href="usados">Usados</a></li>
            </ul>
        </nav>
        <?php
            require_once 'templates/form-marcas.phtml';
        ?>
        <div class="nuevos">
            <?php
            // Muestro los modelos 0km
            foreach ($modelos as $modelo) {
                if ($modelo->es_nuevo === 1) {
                    // Muestro el modelo
                    include 'templates/section-details.phtml';
                }
            }
            ?>
        </div>

    <?php
        require_once 'templates/footer.phtml';
    }

    function showError($msj) {
        echo "<h1> Error </h1>";
        echo "<h2> $msj </h2>";
    }
    ///////////////
    function addCar() {
        require_once 'templates/header.phtml';
    ?>
        <h2>Ingrese vehículo</h2>
        <form action="agregar" method="POST">
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca" id="" placeholder="Ingrese la marca">
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="" placeholder="Ingrese el modelo">
            </div>
            <div class="mb-3">
                <label class="form-label">Año</label>
                <input type="numero" class="form-control" name="anio" id="" placeholder="Ingrese el año">
            </div>

            <div class="mb-3">
                <label class="form-label">Km</label>
                <input type="numero" class="form-control" name="km" id="" placeholder="Ingrese kilómetros">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="numero" class="form-control" name="precio" id="" placeholder="Ingrese valor">
            </div>
            <div class="mb-3">
                <label class="form-label">Patente</label>
                <input type="text" class="form-control" name="patente" id="" placeholder="Ingrese su patente">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" placeholder="Ingrese imagen">
            </div>
                <a href="agregar/"><input type="button" value="Añadir" class="btn btn-success"></a>
                <!-- <button type="submit" class="btn btn-success">Añadir</button> -->
        </form>
<?php
        require_once 'templates/footer.phtml';
    }
}

?>