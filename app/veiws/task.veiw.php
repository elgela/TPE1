<?php 

    class taskVeiw{

        function showTaks($marcas) {
            require_once 'templates/header.phtml';
            ?>
            <form class="marcas">
                <h2>Marca</h2>
                <h3>Seleccione la marca</h3>
                <button type="submit" class="btn btn-info">Buscar</button><input type="text" name="buscar" id="" placeholder="Ingrese marca a buscar...">
                <!-- <form action="ver" method='POST'> -->
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
                                    <td><a href="ver/<?php echo $marca->marca ?>" type="button" name="ver" class="btn btn-success">SELECCIONAR</a></td>
                                    <td><button type="submit" name="modificar" value="modificar" class="btn btn-info">MODIFICAR</button></td>
                                    <td><a href="eliminar/<?php echo $marca->id ?>" type="button" name="eliminar" class="btn btn-danger">ELIMINAR</a></td>
                                    <?php
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                </table>
            </form>
            <?php
            require_once 'templates/footer.php';
        }


        function showTaksUser($marcas) {
            require_once 'templates/header.php';
            ?>
            <form class="marcas">
                <h2>Marca</h2>
                <h3>Seleccione la marca</h3>
                <button type="submit" class="btn btn-info">Buscar</button><input type="text" name="buscar" id="" placeholder="Ingrese marca a buscar...">
                <!-- <form action="ver" method='POST'> -->
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
    

        function showError($msj){
            echo "<h1> Error </h1>";
            echo "<h2> $msj </h12";
        } 
    }
?>