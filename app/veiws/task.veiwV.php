<?php
class taskveiwV {

    function showTaksVehiculos($modelos) {
        require_once 'templates/header.phtml';
?>
        <form class="form-modelos">
            <h2>MODELOS</h2>
            <nav class="navBar">
                <ul>
                    <li><a href="modelos">Todos</a></li>
                    <li><a href="nuevos">0 Km.</a></li>
                    <li><a href="usados">Usados</a></li>
                </ul>
            </nav>
            <!-- <h3>Seleccione la marca</h3> -->
            <?php
                include 'templates/form-addCar.phtml';
            ?>
            <div>
                <button type="submit" class="btn btn-info">Ordenar</button> <input type="text" name="buscar" id="" placeholder="Ordenar por marca">
            </div>
            <div class="modelos">
                <?php foreach ($modelos as $modelo) { 
                    include 'templates/section-details.phtml';
                } ?>
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
                <img src="<?= $modelo->imagen ?>" alt="Imagen de <?= $modelo->modelo ?>" style="max-width:500px;" >
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
                <li><a href="modelos">Todos</a></li>
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
                <li><a href="modelos">Todos</a></li>
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

    function addCar() {
        require_once 'templates/header.phtml';
        require_once 'templates/form-addCar.phtml';
        require_once 'templates/footer.phtml';
    }
    ///////////////mariano-dev

    function showTaksVehiculosUser($modelos , $user) {
    require_once 'templates/header.phtml';
    ?>
    <div class="modelos">
            <?php
            foreach ($modelos as $modelo) {
            ?>
            <section>
                <h4><?php echo $modelo->modelo ?></h4>
                <a href="ver"><img src="<?php echo $modelo->imagen ?>" alt="imagen del modelo"></a>
                <h6><?php echo 'Modelo ' . $modelo->anio ?></h6>
                <h6><?php echo $modelo->patente ?></h6>
                <h5><?php echo number_format($modelo->km, 0, '.', '.') . ' km.' ?></h5>
                <h2><?php echo '$ ' . number_format($modelo->precio, 0, ',', '.'); ?></h2>
                <?php if ($user) { ?> 
                    <?php if (!$modelo->vendido) { ?><a href="vendido/<?php echo $modelo->id ?>" type="button" name="comprar" class="btn btn-danger">Comprar</a> <?php } if ($modelo->vendido) echo '<h1>¡Vendido!</h1>' ?>
                <?php } ?>
                <br>
                <br>
            </section>
            <?php } ?>
        </div>
    </form>
    <?php
    require_once 'templates/footer.phtml';
    }

    function showModelosPorMarca($modelos) {
    require_once 'templates/header.phtml';
    ?>
    <a href="marcas" class="btn btn-secondary">Volver a marcas</a>
        <div class="modelos">
            <?php
            foreach ($modelos as $modelo) {
            ?>
            <section>
                <h4><?php echo $modelo->modelo ?></h4>
                <a href="ver"><img src="<?php echo $modelo->imagen ?>" alt="imagen del modelo"></a>
                <h6><?php echo 'Modelo ' . $modelo->anio ?></h6>
                <h6><?php echo $modelo->patente ?></h6>
                <h5><?php echo number_format($modelo->km, 0, '.', '.') . ' km.' ?></h5>
                <h2><?php echo '$ ' . number_format($modelo->precio, 0, ',', '.'); ?></h2>
                <?php if (!$modelo->vendido) { ?><a href="vendido/<?php echo $modelo->id ?>" type="button" name="comprar" class="btn btn-danger">Comprar</a> <?php } if ($modelo->vendido) echo '<h1>¡Vendido!</h1>' ?>
                <br>
                <br>
            </section>
            <?php }
            ?>
        </div>
    <?php

    }
}

?>