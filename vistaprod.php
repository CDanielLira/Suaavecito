<?php
    require "navbar.php";
    require_once "conexion.php";
    
    $prod = $_GET['prod'];
    $sql = "select * from productos where idproducto = '$prod'";
    $resultado = $conexion -> query($sql);
    $idprod = $_GET['val'];
    if(!empty($idprod)){
        $sql2 = "INSERT INTO carrito (idus, idprod) VALUES ('$usuario', '$idprod') ";
        $conexion -> query($sql2);
        if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                echo '<script> alert("registro insertado") </script>';
        }//fin
    }

    

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
    <div class="cate">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link disabled">Todos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="licores.php">Licores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vinos.php">Vinos</a>
          </li>
        </ul>
    </div>
    

<div class="container">
    <br>
    <br>
    <div class="row">
        <?php
            while( $fila = $resultado ->  fetch_assoc()){
                $id = $fila['idproducto'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
                $des = $fila['descripcion'];
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
                        <p class="card-text"><big >$<?php echo $precio ?></big> <button class="btn btn-primary" id="<?php echo $id ?>" onclick="agregar(this.id)">Seleccionar</button></p>
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
    function agregar(id){
        var ind = parseInt(id);
        //window.print(id);
        window.location.href = window.location.href + "?val=" + ind;
    }
</script>

<?php
require "footer.html";
?>