<?php
    
    require "navbar.php";
    require_once "conexion.php";
    $servidor='localhost';
    $cuenta='id19971352_suave';
    $password='Toros12!suavecito';
    $bd='id19971352_suaavecito';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    else{
         //conexion exitosa

         /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/
        
       
         if(isset($_POST['submit'])&& !empty($_POST['id'])){
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false){
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                }
                //obtenemos datos del formulario
                $id = $_POST['id'];
                $nom =$_POST['nombre'];
                $cat = $_POST['categoria'];
                $desc = $_POST['descripcion'];
                $ex = $_POST['existencia'];
                $prec = $_POST['precio'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO productos (idproducto, nombre, categoria, descripcion, existencia, precio, imagen) VALUES('$id','$nom','$cat','$desc', '$ex', '$prec', '$imgContent')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    echo '<script> alert("registro insertado") </script>';
                }//fin
             
              //continaumos con la consulta de datos a la tabla usuarios
         //vemos datos en un tabla de html
         $sql = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
         $resultado = $conexion -> query($sql); //aplicamos sentencia

         if ($resultado -> num_rows){ //si la consulta genera registros
              echo '<div style="margin-left: 20px;">';
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
                        echo '<td>'. $fila['Idprod'] . '</td>';
                        echo '<td>'. $fila['nombre'] . '</td>';
                        echo '<td>'. $fila['categoria'] . '</td>';
                        echo '<td>'. $fila['descripcion'] . '</td>';
                        echo '<td>'. $fila['existencia'] . '</td>';
                        echo '<td>'. $fila['precio'] . '</td>';
                        echo '<td> <img src="data:imagen/jpeg;base64,'. base64_encode($fila['imagen']) .'"/></td>';
                    echo '</tr>';
                }   
                echo '</table">';
             echo '</div>';
         }
         else{
             echo "no hay datos";
         }
        
         }//fin 
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        td,
        th {
            padding: 10px;

        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
                    <h2>Registro de Productos</h2>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="text" id="categoria" name="categoria" class="form-control" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input type="text" id="existencia" name="existencia" class="form-control" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="img">Imagen</label>
                        <input name="image" type="file" class="form-control" id="contra" placeholder="" accept="image/jpeg">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
</body>
</html>
