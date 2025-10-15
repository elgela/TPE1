<?php 
    class taskveiwV{

        function showTaksV($modelos) {
            require_once 'templates/header.phtml';
            ?>
            <form class="form-modelos">
                <h2>Modelos</h2>
                <h3>Seleccione la marca</h3>
                <button type="submit" class="btn btn-info">Ordenar</button> <input type="text" name="buscar" id="" placeholder="Ordenar por marca">
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
                    <?php } ?>
                </div>
            </form>
            <?php
            require_once 'templates/footer.phtml';
        }

        function showError($msj){
            echo "<h1> Error </h1>";
            echo "<h2> $msj </h12";
        } 
    }


?>