<?php
    require "navbar.php";
    require_once "conexion.php";
    
    $sql = 'select * from productos';
    $resultado = $conexion -> query($sql);
    if(!empty($_GET['vr'])) {
        $idprod = $_GET['vr'];
        $sql2 = "INSERT INTO carrito (idus, idprod) VALUES ('$usuario', '$idprod') ";
        $conexion -> query($sql2);
        if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
        
        }//fin
        $existencia = $conexion -> query("Select existencia from productos where idproducto='$idprod'");
        $existencia = $existencia->fetch_assoc();
        $existencia = $existencia['existencia'];
        $existencia--;
        $conexion->query("UPDATE productos SET existencia='" .$existencia . "' WHERE idproducto='" . $idprod . "';");
        echo "<script>setTimeout(\"location.href='tienda.php?cat=" .$_GET['cat']. "'\",1)</script>";
    }
    if(!empty($_GET['cat'])){
        $cat = $_GET['cat'];
    }
    else {
        $cat = "Todos";
    }
?>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<style>
    .efecto:hover{
    transform: scale(1.3);
 }
 .efecto{
     transition:all 0.3s ease 0s;
 }
</style> 
</head>

<body>
    <p id="categ" hidden><?php echo $cat?></p>
    <div class="cate">
        <hr class="border border-danger border-3 opacity-0">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <?php
                if($cat == "Todos")
                    echo "<a class='btn btn-outline-danger' style='pointer-events: none;' href='tienda.php?cat=Todos' role='button' disabled>Todos</a>";
                else
                    echo "<a class='btn btn-outline-danger' href='tienda.php?cat=Todos' role='button'>Todos</a>";
            ?>
            </li>
            <li class="nav-item">
                <?php
                if($cat == "Licores")
                    echo "<a class='btn btn-outline-danger' style='pointer-events: none;' href='tienda.php?cat=Licores' role='button' disabled>Licores</a>";
                else
                    echo "<a class='btn btn-outline-danger' href='tienda.php?cat=Licores' role='button'>Licores</a>";
            ?>
            </li>
            <li class="nav-item">
                <?php
                if($cat == "Vinos")
                    echo "<a class='btn btn-outline-danger' style='pointer-events: none;' href='tienda.php?cat=Vinos' role='button' disabled>Vinos</a>";
                else
                    echo "<a class='btn btn-outline-danger' href='tienda.php?cat=Vinos' role='button'>Vinos</a>";
            ?>
            </li>
        </ul>
    </div>

    <div class="container">
        <br>
        <br>
        <div class="row">
            <script>
                var array = [];

            </script>
            <?php
            $resultado = $conexion -> query($sql);
            while($fila = $resultado ->  fetch_assoc()){
                $id = $fila['idproducto'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
                $descuento = $fila['descuento'];
                $existencia = $fila['existencia'];
                $categoria = $fila['categoria'];
                if($cat == "Todos" || $categoria == $cat) {
        ?>
            <script>
                array.push("<?php echo $id ?>");

            </script>
            <div class="card" style="width: 22rem; margin: 0 auto;">
            
                <img id="<?php echo $id ?>" onclick="vista(this.id)" class="card-img-top efecto" width="16rem" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila['imagen']);?>" />
                <div>
                    <h5><?php 
                        if($descuento == 0)
                            echo '$' . $precio;
                        else {
                            echo "<span style='text-decoration:line-through;'>$". $precio ."</span>";
                            echo " $" . ($precio - $descuento);
                        }
                    ?></h5>
                    <p><?php echo $nombre ?></p>
                    <?php
                        echo "<h6>Disponibles: " . $existencia . "</h6>";
                        if(!empty($_SESSION['id']) && $existencia > 0){
                            ?><button class="btn btn-outline-danger" id="<?php echo $id ?>" onclick="agregar(this.id)">Agregar al carrito</button><?php
                        }
                        else if(!empty($_SESSION['id']) && $existencia <= 0){
                            ?><button class="btn btn-secondary">No disponible</button><?php
                        }
                        else{
                            ?><a href="ingresar.php" class="btn btn-secondary">Iniciar sesión</a><?php
                        }
                    ?>
                </div>

                <br>
            </div>
            <?php
                }//fin if
            }//fin while
        ?>
        </div>
        <br>
        <br>
    </div>
</body>

<script>
    function agregar(id) {
        var ind = parseInt(id);
        //window.print(id);
        var cate = document.getElementById('categ').innerHTML;
        window.location.href = "tienda.php?vr=" + ind + "&cat=" + cate;
    }

    function vista(id) {
        var ind = parseInt(id);
        //window.print(id);
        window.location.href = "vistaprod.php?prod=" + ind;
    }

</script>

<?php
require "footer.html";
?>
