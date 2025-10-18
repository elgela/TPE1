<?php 
    class taskVeiw{
        function showTaks($marcas) {
            require_once 'templates/header.php';
            ?>
            <form action="buscar" method="post" class="marcas">
                <h2>Marca</h2>
                <h3>Seleccione la marca</h3>
                <input type="text" name="marca"  placeholder="Ingrese marca a buscar...">
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>
                <table class="brands">
                    <thead>
                        <tr style='background-color: yellow;'>
                            <th style='border: 1px solid black;padding:7px;'>Marca</th>
                            <th style='border: 1px solid black;padding:7px;'>Nacionalidad</th>
                            <th style='border: 1px solid black;padding:7px;'>Año de creación</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                foreach ($marcas as $marca) {
                                    echo"<tr>";
                                    echo "<td style='padding:5px;'>$marca->marca</td>
                                    <td style='padding:5px;text-align:center;'>$marca->nacionalidad</td>
                                    <td style='padding:5px;text-align:center;'>$marca->anio_de_creacion</td>"
                                    ?>
                                    <td><a href="ver/<?php echo $marca->id ?>" type="button" name="ver" class="btn btn-success">SELECCIONAR</a></td>
                                    <td><a href="modificar/<?php echo $marca->id ?>" type="button" name="modificar" class="btn btn-info">MODIFICAR</a></td>
                                    <td><a href="eliminar/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                    <?php
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                </table>
                <section class="form-agregar">
                    <h3>Agregar nueva marca</h3>
                    <form action="agregar" method="POST">
                        <label>Marca</label>
                        <input type="text" name="marca" required>

                        <label>Nacionalidad</label>
                        <input type="text" name="nacionalidad" required>
                        
                        <label>Año de creación</label>
                        <input type="number" name="anio" required>

                        <button type="submit">Agregar</button>
                    </form>
                </section>
                
            <?php
            require_once 'templates/footer.php';
        }

        function showTaksById($marca) {
            require_once 'templates/header.php';
            ?>
            <form action="buscar" method="post" class="marcas">
                <h2>Marca</h2>
                <h3>Seleccione la marca</h3>
                <input type="text" name="marca"  placeholder="Ingrese marca a buscar...">
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>
                <table class="brands">
                    <thead>
                        <tr style='background-color: yellow;'>
                            <th style='border: 1px solid black;padding:7px;'>Marca</th>
                            <th style='border: 1px solid black;padding:7px;'>Nacionalidad</th>
                            <th style='border: 1px solid black;padding:7px;'>Año de creación</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                echo"<tr>";
                                echo "<td style='padding:5px;'>$marca->marca</td>
                                <td style='padding:5px;text-align:center;'>$marca->nacionalidad</td>
                                <td style='padding:5px;text-align:center;'>$marca->anio_de_creacion</td>"
                                ?>
                                <td><a href="ver/<?php echo $marca->id ?>" type="button" name="ver" class="btn btn-success">SELECCIONAR</a></td>
                                <td><a href="modificar/<?php echo $marca->id ?>" type="button" name="modificar" class="btn btn-info">MODIFICAR</a></td>
                                <td><a href="eliminar/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                <?php
                                echo "</tr>";
                            ?>
                        </tbody>
                </table>
            <?php
            require_once 'templates/footer.php';
        }


        function showTaksUser($marcas) {
            require_once 'templates/header.php';
            ?>
            <form action="buscar" method="post" class="marcas">
                <h2>Marca</h2>
                <h3>Seleccione la marca</h3>
                <input type="text" name="marca"  placeholder="Ingrese marca a buscar...">
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>
                <table class="brands">
                    <thead>
                        <tr style='background-color: yellow;'>
                            <th style='border: 1px solid black;padding:7px;'>Marca</th>
                            <th style='border: 1px solid black;padding:7px;'>Nacionalidad</th>
                            <th style='border: 1px solid black;padding:7px;'>Año de creación</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                foreach ($marcas as $marca) {
                                    echo"<tr>";
                                    echo "<td style='padding:5px;'>$marca->marca</td>
                                    <td style='padding:5px;text-align:center;'>$marca->nacionalidad</td>
                                    <td style='padding:5px;text-align:center;'>$marca->anio_de_creacion</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                </table>
            </form>
            <?php
            require_once 'templates/footer.php';
        }


        function showEditForm($marca) {
            require_once 'templates/header.php';
            ?>
            <h2>Editar marca</h2>
            <form action="actualizar" method="post" class="marcas">
                <input type="hidden" name="id" value="<?= $marca->id ?>">

                <label>Marca</label>
                <input type="text" name="marca" value="<?= htmlspecialchars($marca->marca) ?>" required>

                <label>Nacionalidad</label>
                <input type="text" name="nacionalidad" value="<?= htmlspecialchars($marca->nacionalidad) ?>" required>

                <label>Año de creación</label>
                <input type="number" name="anio" value="<?= htmlspecialchars($marca->anio_de_creacion) ?>" required>

                <button type="submit">Guardar cambios</button>
            </form>
            <?php
            require_once 'templates/footer.php';
        }
    

        function showError($msj){
            echo "<h1> Error </h1>";
            echo "<h2> $msj </h12";
        } 
    }
?>