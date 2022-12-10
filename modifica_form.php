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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $modificar = $_POST['modificar'];
        echo "ID Modificar: " . $modificar . "<br>";
        $_SESSION['modificar2'] = $modificar;
        $sql2 = "SELECT *
                FROM productos
                WHERE idproducto ='$modificar'";
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
    else {
        echo "NO POST";
    }


if(isset($_POST['mod'])){
    $check = getimagesize($_FILES["imagen2"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['imagen2']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $uno = $_POST['id2'];
    $dos = $_POST['nombre2'];
    $tres = $_POST['categoria2'];
    $cuatro = $_POST['descripcion2'];
    $cinco = $_POST['existencia2'];
    $seis = $_POST['precio2'];
    $modificar1 = $_SESSION['modificar2'];
    
    $ne = "UPDATE productos 
            SET nombre='$dos', categoria='$tres', descripcion='$cuatro', existencia='$cinco', precio='$seis', imagen='$imgContent' WHERE idproducto='$uno'";
    $fin = $conexion -> query($ne);
     if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
        echo '<script> alert("registro insertado") </script>';
        //redireccionar a modifica.php
    }
    else {
        echo '<script> alert("error") </script>';
    }
    //fin
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<link rel="stylesheet" href="estilos.css">
<body>
    <div class="derecha">
        
            <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
            <ul class="wrapper">
                <li class="form-row">
                <label for="id">ID</label>
                <input type="number" name="id2" id="id" value="<?php echo $_SESSION["id"]; ?>" >
                </li>
                <li class="form-row">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="nombre2" value="<?php echo $_SESSION["nom"]; ?>">
                </li>
                <li class="form-row">
                <label for="categoria">CATEGORIA</label>
                <input type="text" id="categoria" name="categoria2" value="<?php echo $_SESSION["cat"]; ?>">
                </li>
                <li class="form-row">
                <label for="descripcion">DESCRIPCION</label>
                <input type="text" id="descripcion" name="descripcion2" value="<?php echo $_SESSION['des']; ?>">
                </li>
                <li class="form-row">
                <label for="existencia">EXISTENCIA</label>
                <input type="number" id="existencia" name="existencia2" value="<?php echo $_SESSION["ex"]; ?>">
                </li>
                <li class="form-row">
                <label for="precio">PRECIO</label>
                <input type="number" id="precio" name="precio2" value="<?php echo $_SESSION["pre"]; ?>">
                </li>
                <li class="form-row">
                <label for="image">IMAGEN</label>
                <input require type="file" id="image" name="imagen2" accept="image/jpeg">
                <input type="hidden" name="modificar2" value="<?php $modificar ?>">
                </li>
                <li class="form-row">
                <button type="submit" name="mod">Modificar</button>
                </li>
            </ul>
            </form>       
        </div>
</body>
</html>
<?php
require "footer.html";
?>