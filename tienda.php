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
                echo '<script> alert("registro insertado") </script>';
        }//fin
        $existencia = $conexion -> query("Select existencia from productos where idproducto='$idprod'");
        $existencia = $existencia->fetch_assoc();
        $existencia = $existencia['existencia'];
        $existencia--;
        $conexion->query("UPDATE productos SET existencia='" .$existencia . "' WHERE idproducto='" . $idprod . "';");
    }
    if(!empty($_GET['cat'])){
        $cat = $_GET['cat'];
    }
    else {
        $cat = "Todos";
    }

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
    <p id="categ" hidden><?php echo $cat?></p>
    <div class="cate">
        <ul class="nav justify-content-center">
        <li class="nav-item">
            <?php
                if($cat == "Todos")
                    echo "<a class='nav-link disabled'>Todos</a>";
                else
                    echo "<a class='nav-link' href='tienda.php?cat=Todos'>Todos</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
                if($cat == "Licores")
                    echo "<a class='nav-link disabled'>Licores</a>";
                else
                    echo "<a class='nav-link' href='tienda.php?cat=Licores'>Licores</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
                if($cat == "Vinos")
                    echo "<a class='nav-link disabled'>Vinos</a>";
                else
                    echo "<a class='nav-link' href='tienda.php?cat=Vinos'>Vinos</a>";
            ?>
        </li>
        </ul>
    </div>    

<div class="container">
    <br>
    <br>
    <div class="row">
        <script> 
            var array=[];
        </script>
        <?php
            $resultado = $conexion -> query($sql);
            while($fila = $resultado ->  fetch_assoc()){
                $id = $fila['idproducto'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
                $existencia = $fila['existencia'];
                $categoria = $fila['categoria'];
                if($cat == "Todos" || $categoria == $cat) {
        ?>
                    <script>
                        array.push("<?php echo $id ?>");
                    </script>
                    <div class="card" style="width: 22rem;">
                        
                            <!--<img onclick="" class="card-img-top" width="250" height="250" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila['imagen']);?>"/>-->
                            <img id="<?php echo $id ?>" onclick="vista(this.id)" class="card-img-top" width="16rem" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila['imagen']);?>"/>
                            <div>
                                <h5>$<?php echo $precio ?></h5>
                                <p><?php echo $nombre ?></p>
                                <?php
                                    echo "<h6>Disponibles: " . $existencia . "</h6>";
                                    if(!empty($_SESSION['id']) && $existencia > 0){
                                        ?><button class="btn btn-primary" id="<?php echo $id ?>" onclick="agregar(this.id)">Agregar al carrito</button><?php
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
    function agregar(id){
        var ind = parseInt(id);
        //window.print(id);
        var cate = document.getElementById('categ').innerHTML;
        window.location.href = "https://suaavecitoo.000webhostapp.com/tienda.php?vr=" + ind + "&cat=" + cate;
    }
    
    function vista(id){
        var ind = parseInt(id);
        //window.print(id);
        window.location.href = "https://suaavecitoo.000webhostapp.com/vistaprod.php?prod=" + ind;
    }
</script>

<?php
require "footer.html";
?>
