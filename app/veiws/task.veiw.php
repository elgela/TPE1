<?php 
    class taskVeiw{
        
        function showTaks($marcas) {
            require_once './templates/header.phtml';
            ?>
            <form action="buscarMarca" method="post" class="marcas">
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
                                <td style='padding:5px;text-align:center;'>$marca->anio_de_creacion</td>"; ?>
                                <td><a href="ver/<?php echo $marca->id ?>" type="button" name="ver" class="btn btn-success">SELECCIONAR</a></td>
                                <td><a href="modificarMarca/<?php echo $marca->id ?>" type="button" name="modificar" class="btn btn-info">MODIFICAR</a></td>
                                <td><a href="eliminarMarca/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                <?php
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
            <?php if ($user) {?>
                <section class="form-agregar">
                    <h3>Agregar nueva marca</h3>
                    <form action="agregarMarca" method="POST">
                        <label>Marca</label>
                        <input type="text" name="marca" required>

                        <label>Nacionalidad</label>
                        <input type="text" name="nacionalidad" required>
                        
                        <label>Año de creación</label>
                        <input type="number" name="anio" required>

                        <button type="submit">Agregar</button>
                    </form>
                    
                </section>
            <?php }
            require_once 'templates/footer.phtml';
        }


        
        function usershowTaks($marcas, $user) {
            require_once './templates/header.phtml';
            ?>
            <form action="buscarMarca" method="post" class="marcas">
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
                                if ($user) { ?>
                                    <td><a href="ver/<?php echo $marca->id ?>" type="button" name="ver" class="btn btn-success">SELECCIONAR</a></td>
                                    <td><a href="modificarMarca/<?php echo $marca->id ?>" type="button" name="modificar" class="btn btn-info">MODIFICAR</a></td>
                                    <td><a href="eliminarMarca/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                <?php } 
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
            
            <?php if ($user) {?>
                <section class="form-agregar">
                    <h3>Agregar nueva marca</h3>
                    <form action="agregarMarca" method="POST">
                        <label>Marca</label>
                        <input type="text" name="marca" required>

                        <label>Nacionalidad</label>
                        <input type="text" name="nacionalidad" required>
                        
                        <label>Año de creación</label>
                        <input type="number" name="anio" required>

                        <button type="submit">Agregar</button>
                    </form>
                    
                </section>
            <?php }
            
            require_once 'templates/footer.phtml';
        }

        function showTaksById($marca,$user) {
            require_once 'templates/header.phtml';
            ?>
            <form action="buscarMarca" method="post" class="marcas">
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
                                <td><a href="modificarMarca/<?php echo $marca->id ?>" type="button" name="modificar" class="btn btn-info">MODIFICAR</a></td>
                                <td><a href="eliminarMarca/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                <?php
                                echo "</tr>";
                            ?>
                        </tbody>
                </table>
            <?php
            require_once 'templates/footer.phtml';
        }


        function showEditForm($marca) {
            require_once 'templates/header.phtml';
            require_once 'templates/formularioEditarMarca.phtml';
            require_once 'templates/footer.phtml';
        }
    

        function showError($msj){
            echo "<h1> Error </h1>";
            echo "<h2> $msj </h12";
        } 
    }
?>