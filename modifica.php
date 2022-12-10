<?php
    require "navbar.php";
    require_once "conexion.php";
    $servidor='localhost';
    $cuenta='id19971352_suave';
    $password='Toros12!suavecito';
    $bd='id19971352_suaavecito';
     
    $_SESSION['id'] = '';
    $_SESSION['nom'] = '';
    $_SESSION['cat'] = '';
    $_SESSION['des'] = '';
     $_SESSION['ex'] = '';
     $_SESSION['pre'] = '';
    $_SESSION['img'] = '';
   
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

if (isset($_POST['submit'])){
    $modificar = $_POST['modificar'];
    $_SESSION['modificar2'] = $modificar;
    $sql2 = "SELECT *
            FROM productos
            WHERE idproducto='$modificar'";
    $resultado = $conexion -> query($sql2);
    while($fila = $resultado -> fetch_assoc()){
        $_SESSION['id'] = $fila['idproducto'];
        $_SESSION['nom'] = $fila['nombre'];
        $_SESSION['cat'] = $fila['categoria'];
        $_SESSION['des'] = $fila['descripcion'];
        $_SESSION['ex'] = $fila['existencia'];
        $_SESSION['pre'] = $fila['precio'];
        $_SESSION['img'] = $fila['imagen'];
        
    }
}

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    
   
</head>
<body>
    
    <div class="contenedor1">
        <div class="contenedor2">
            <div class="izquierdaAlta">

            <?php        
         //continuamos con la consulta de datos a la tabla usuarios
         //vemos datos en un tabla de html
         $sql = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
         $resultado = $conexion -> query($sql); //aplicamos sentencia
         
         if ($resultado -> num_rows){ //si la consulta genera registros
         ?>
 
                
         <div class="izqAlta">      
            <form action="modifica_form.php" method='post'>  
            
            <legend>Modificar Cuentas</legend>
                <br>
                <select   class="custom-select" name='modificar' >
                <?php
                while( $fila = $resultado -> fetch_assoc() ){ //recorremos los registros obtenidos de la tabla
                    echo '<option value="'.$fila['idproducto'].'">'.$fila["nombre"].'</option>';
                    //proceso de concatenacion de datos
                }//fin while
                ?>
                </select>
                <br><br>
                <button type="submit" name="submit">Modificar</button>               
            </form>
            <div class="izquierdaBaja">
                <?php
                $sql = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion -> query($sql); //aplicamos sentencia
        
        if ($resultado -> num_rows){ //si la consulta genera registros
            echo '<div style="margin-left: 20px;">';
            echo '<table style="width:40%;">';
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
                    echo '<td> <img width=50 higth= 50 src="data:imagen/jpeg;base64,'. base64_encode($fila['imagen']) .'"/></td>';
                echo '</tr>';
            }   
            echo '</table">';
        }
                ?>
            </div> 
            </div>
         <?php
        
         }
         else{
             echo "no hay datos";
         }
        
?>
        </div>
            
            
        </div>
        
    </div>
</body>
</html>
<?php
require "footer.html";
?>