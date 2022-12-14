<?php
    require "navbar.php";
    require_once "conexion.php";
    
    $prod = $_GET['prod'];
    $sql = "select * from productos where idproducto = '$prod'";
    $resultado = $conexion -> query($sql);
    if(!empty($_GET['add'])){
        $idprod = $_GET['prod'];
        $sql2 = "INSERT INTO carrito (idus, idprod) VALUES ('$usuario', '$idprod') ";
        $conexion -> query($sql2);
        if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                //echo '<script> alert("registro insertado") </script>';
        }//fin
        $existencia = $conexion -> query("Select existencia from productos where idproducto='$idprod'");
        $existencia = $existencia->fetch_assoc();
        $existencia = $existencia['existencia'];
        $existencia--;
        $conexion->query("UPDATE productos SET existencia='" .$existencia . "' WHERE idproducto='" . $idprod . "';");
        echo "<script>setTimeout(\"location.href='vistaprod.php?prod=" .$prod. "'\",1)</script>";
    }

    

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

<div class="container">
    <br>
    <br>
    <div class="row">
        <?php
            $resultado = $conexion -> query($sql);
            while( $fila = $resultado ->  fetch_assoc()){
                $id = $fila['idproducto'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
                $descuento = $fila['descuento'];
                $des = $fila['descripcion'];
                $existencia = $fila['existencia'];
        ?>
                <div class="card" style="width: 100rem;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img id="<?php echo $id ?>" class="card-img-top" width="50rem" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila['imagen']);?>"/>
                    </div>
                    <div class="col-md-5">
                      <div class="card-body">
                        <h5 class="card-title" style>-<?php echo $nombre ?></h5>
                        <p class="card-text"><?php echo $des ?></p>
                        <h5><?php 
                        if($descuento == 0)
                            echo '$' . $precio;
                        else {
                            echo "<span style='text-decoration:line-through;'>$". $precio ."</span>";
                            echo " $" . ($precio - $descuento);
                        }
                    ?></h5>
                        <?php
                            echo "<h5>Disponibles: " . $existencia . "</h5>";
							if(!empty($_SESSION['id']) && $existencia > 0){
								?><button class="btn btn-outline-danger" onclick="agregar()">Agregar al carrito</button><?php
							}
							else if(!empty($_SESSION['id']) && $existencia <= 0){
								?><button class="btn btn-secondary">No disponible</button><?php
							}
							else{
								?><a href="ingresar.php" class="btn btn-secondary">Iniciar sesi??n</a><?php
							}
                        ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                
        <?php
            }//fin while
        ?>
    </div>
    <br>
    <br>
</div>
</body>


<script>   
    function agregar(){
        window.location.href = window.location.href + "&add=si";
    }
</script>

<?php
require "footer.html";
?>