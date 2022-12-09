<?php
    require "navbar.php";
    require_once "conexion.php";
    $servidor='localhost';
    $cuenta='id19971352_suave';
    $password='Toros12!suavecito';
    $bd='id19971352_suaavecito';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    $sql = "select * from productos where categoria = 'Vinos'";
    $resultado = $conexion -> query($sql);
    $idprod = $_GET['vr'];
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
            <a class="nav-link" href="tienda.php">Todos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="licores.php">Licores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Vinos</a>
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
            while( $fila = $resultado ->  fetch_assoc()){
                $id = $fila['idproducto'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
        ?>
                <script>
                    array.push("<?php echo $id ?>");
                </script>
                <div class="card" style="width: 22rem;">
                        <img id="<?php echo $id ?>" onclick="vista(this.id)" class="card-img-top" width="16rem" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila['imagen']);?>"/>
                        <div>
                            <h5>$<?php echo $precio ?></h5>
                            <p><?php echo $nombre ?></p>
                            <button class="btn btn-primary" id="<?php echo $id ?>" onclick="agregar(this.id)">Seleccionar</button>
                        </div>
                        
                   <br>
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
        window.location.href = "https://suaavecitoo.000webhostapp.com/tienda.php?vr=" + ind;
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