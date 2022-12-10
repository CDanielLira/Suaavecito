<?php
    require "navbar.php";
    require_once "conexion.php";

    if($conexion->connect_errno){
        die('Error en la conexion');
    }
    else{
        if(isset($_POST['submit'])){
            $eliminar = $_POST['eliminar'];

            $sql = "select * from productos where idproducto = '$eliminar'";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
            $resultado = $conexion -> query($sql); //aplicamos sentencia
             
            if ($resultado -> num_rows){ //si la consulta genera registros
                echo '<div style="margin-left: 20px;" class="px-5">';
                    echo '<table class="table table-hover" style="width:50%;">';
                        echo '<tr>';
                            echo '<th>id</th>';
                            echo '<th>nombre</th>';
                            echo '<th>categoria</th>';
                            echo '<th>descripcion</th>';
                            echo '<th>existencia</th>';
                            echo '<th>precio</th>';
                            echo '<th>imagen</th>';
                        echo '</tr>';
                        while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                            echo '<tr>';
                                echo '<td>'. $fila['idproducto'] . '</td>';
                                echo '<td>'. $fila['nombre'] . '</td>';
                                echo '<td>'. $fila['categoria'] . '</td>';
                                echo '<td>'. $fila['descripcion'] . '</td>';
                                echo '<td>'. $fila['existencia'] . '</td>';
                                echo '<td>'. $fila['precio'] . '</td>';
                                echo '<td> <img widht="25rem" src="data:imagen/jpeg;base64,'. base64_encode($fila['imagen']) .'"/></td>';
                            echo '</tr>';
                        }   
                echo '</table">';
            echo '</div>';
            }
            $sql = "DELETE FROM productos WHERE idproducto= '$eliminar'";
            $conexion->query($sql);
            if($conexion->affected_rows >= 1){
                echo '<br> registro borrado <br>';
            }
        }
        $sql = 'select * from productos';
        $resultado = $conexion -> query($sql);

        if ($resultado -> num_rows){
            ?>
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <legend>Eliminar Cuentas</legend>
                    <br>
                    <select class="browser-default custom-select" name="eliminar">
                        <?php
                        while ($fila = $resultado -> fetch_assoc()){
                            echo '<option value="'.$fila["idproducto"].'">'.$fila["nombre"].'</option>';
                        }?>
                    </select>
                    <br><br>
                    <button type="submit" value="sumbit" name="submit">Eliminar</button>
                </form>
            </div>
            <?php
        }
        else{
            echo "NO hay datos";
        }
    }
?>
<!DOCTYPE html>	
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div>
        <pre>


        </pre>
    </div>
</body>
</html>
<?php
    
    require "footer.html";
?>