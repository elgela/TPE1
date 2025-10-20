<?php 
    class taskveiwV{

        function showTaksVehiculos($modelos) {
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

        function showError($msj){
            echo "<h1> Error </h1>";
            echo "<h2> $msj </h12";
        } 
    }


?>