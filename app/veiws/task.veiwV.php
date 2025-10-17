<?php
class taskveiwV {

    function showTaksV($modelos)
    {
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
                <button type="submit" class="btn btn-outline-info" name="agregar">Agregar vehículo</button>
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
                            echo '<h1>¡Vendido!</h1>';
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

        <form action="/action_page.php">
            <label for="cars">Marca:</label>
            <select name="cars" id="cars" class="form-select" aria-label="Default select example">
                <option value="">Seleccione una marca</option>
                <optgroup label="EE.UU">
                    <option value="ford">Ford</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="jeep">Jeep</option>
                </optgroup>
                <optgroup label="Japón">
                    <option value="toyota">Toyota</option>
                    <option value="mitsubishi">Mitsubishi</option>
                </optgroup>
                <optgroup label="Francia">
                    <option value="citroen">Citroën</option>
                    <option value="renault">Renault</option>
                    <option value="peugeot">Peugeot</option>
                </optgroup>
                <optgroup label="Alemania">
                    <option value="volkswagen">Volkswagen</option>
                    <option value="audi">Audi</option>
                    <option value="bmw">BMW</option>
                </optgroup>
                <optgroup label="Italia">
                    <option value="fiat">Fiat</option>
                    <option value="alfa">Alfa Romeo</option>
                </optgroup>
            </select>
            <br><br>
            <input type="submit" value="Mostrar">
        </form>

        <div class="usados">
            <?php

            // Muestro los modelos usados
            foreach ($modelos as $modelo) {
                if ($modelo->es_nuevo === 0) {
                    // Muestro el modelo
            ?>
                    <section>
                        <h4><?php echo $modelo->modelo ?></h4>
                        <a href="<?php echo $modelo->imagen ?>"><img src="<?php echo $modelo->imagen ?>" alt="imagen del modelo"></a>
                        <h6><?php echo 'Modelo ' . $modelo->anio ?></h6>
                        <h5><?php echo number_format($modelo->km, 0, '.', '.') . ' km.' ?></h5>
                        <h2><?php echo '$ ' . number_format($modelo->precio, 0, ',', '.'); ?></h2>
                        <?php if (!$modelo->vendido) { ?><a href="vendido/<?php echo $modelo->id ?>" type="button" name="comprar" class="btn btn-danger">Comprar</a> <?php }
                        if ($modelo->vendido) {
                            echo '<h1>¡Vendido!</h1>';
                        } else {
                        ?><a href="detalles/<?php echo $modelo->id ?>" type="button" name="detalles" class="btn btn-danger">Detalles</a>
                        <?php } ?>
                        <br>
                    </section>
            <?php
                }
            }
            ?>
        </div>

    <?php
        require_once 'templates/footer.phtml';
    }


    function factoryCars($modelos) {
        require_once 'templates/header.phtml';
    ?>
        <h1>Autos 0Km</h1>
        <nav class="navBar">
            <ul>
                <li><a href="nuevos">0 Km.</a></li>
                <li><a href="usados">Usados</a></li>
            </ul>
        </nav>

        <form action="/action_page.php" method="POST">
            <label for="marca">Marca:</label>
            <select name="cars" id="cars" class="form-select" aria-label="Default select example">
                <option value="">Seleccione una marca</option>
                <optgroup label="EE.UU">
                    <option value="ford">Ford</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="jeep">Jeep</option>
                </optgroup>
                <optgroup label="Japón">
                    <option value="toyota">Toyota</option>
                    <option value="mitsubishi">Mitsubishi</option>
                </optgroup>
                <optgroup label="Francia">
                    <option value="citroen">Citroën</option>
                    <option value="renault">Renault</option>
                    <option value="peugeot">Peugeot</option>
                </optgroup>
                <optgroup label="Alemania">
                    <option value="volkswagen">Volkswagen</option>
                    <option value="audi">Audi</option>
                    <option value="bmw">BMW</option>
                </optgroup>
                <optgroup label="Italia">
                    <option value="fiat">Fiat</option>
                    <option value="alfa">Alfa Romeo</option>
                </optgroup>
            </select>
            <br><br>
            <input type="submit" value="Mostrar">
        </form>

        <div class="nuevos">
            <?php
            // Muestro los modelos usados
            foreach ($modelos as $modelo) {
                if ($modelo->es_nuevo === 1) {
                    // Muestro el modelo
            ?>
                    <section>
                        <h4><?php echo $modelo->modelo ?></h4>
                        <a href="<?php echo $modelo->imagen ?>"><img src="<?php echo $modelo->imagen ?>" alt="imagen del modelo"></a>
                        <h6><?php echo 'Modelo ' . $modelo->anio ?></h6>
                        <h5><?php echo number_format($modelo->km, 0, '.', '.') . ' km.' ?></h5>
                        <h2><?php echo '$ ' . number_format($modelo->precio, 0, ',', '.'); ?></h2>
                        <?php if (!$modelo->vendido) { ?><a href="vendido/<?php echo $modelo->id ?>" type="button" name="comprar" class="btn btn-danger">Comprar</a> <?php }
                        if ($modelo->vendido) {
                            echo '<h1>¡Vendido!</h1>';
                        } else {
                        ?><a href="detalles/<?php echo $modelo->id ?>" type="button" name="detalles" class="btn btn-danger">Detalles</a>
                        <?php } ?>
                        <br>
                    </section>
            <?php
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
            <form action="agregar" method="post">
                <button type="submit" class="btn btn-success">Añadir</button>
            </form>
        </form>
<?php
        require_once 'templates/footer.phtml';
    }
}

?>