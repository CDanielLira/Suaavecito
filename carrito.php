<?php
    require "navbar.php";
    require_once "conexion.php";

    $sql = "select * from carrito where idus = '$usuario'";
    $resultado = $conexion -> query($sql);
    if(!empty($_GET['vr'])){
        $idprod = $_GET['vr'];
        $sql2 = "DELETE FROM carrito WHERE idus= '$usuario' AND idprod = '$idprod' LIMIT 1";
        $conexion -> query($sql2);
        echo '<script>window.location.href = "carrito.php";</script>';
    }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
    <div class="cate">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active">Carrito</a>
          </li>
    </div>
    
<div class="container">
    <br>
    <br>
    <div class="row">
        <?php
            $total = 0;
            while($fila = $resultado -> fetch_assoc()){
                $id = $fila['idprod'];
                $sql3 = "select * from productos where idproducto = '$id'";
                $resultado3 = $conexion -> query($sql3);
                while( $fila2 = $resultado3 -> fetch_assoc()){
                    $nombre = $fila2['nombre'];
                    $precio = $fila2['precio'];
                    $total += $precio;
        ?>
                <div class="card mb-6" style="max-width: 35rem;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img id="<?php echo $id ?>" class="card-img-top" width="30rem" src="data:imagen/jpeg;base64,<?php echo base64_encode($fila2['imagen']);?>"/>
                    </div>
                    <div class="col-md-5">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <p class="card-text"><strong>$<?php echo $precio ?></strong> <button class="btn btn-primary" id="<?php echo $id ?>" onclick="agregar(this.id)">Quitar del carrito</button></p>
                      </div>
                    </div>
                  </div>
                </div>
                    
        <?php
            }
        }//fin while
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  action="pagos.php" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elige un método de pago</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>¡Estás a un paso de finalizar tu compra!</h4>
                        <hr class="border border-danger border-1 opacity-0">
                        <h5>¿Tienes un cupón de descuento?</h5>
                        <h5>Ingrésalo aquí: <h6><input type="text" name="cupon"></h6></h5>
                        <hr class="border border-danger border-1 opacity-0">
                        <h5>Selecciona el método de pago para continuar</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button submit" class="btn btn-primary" name="tarjeta" value="VISA">Visa</button>
                        <button type="button submit" class="btn btn-primary" name="tarjeta" value="MASTERCARD">Mastercard</button>
                        <button type="button submit" class="btn btn-danger" name="tarjeta" value="OXXO">OXXO</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <div>
        <h5 class="card-title px-5">Total a pagar: $<?php echo $total?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Finalizar compra
            </button>
        </h5>
    </div>
</div>
</body>



<script>   
    function agregar(id){
        var ind = parseInt(id);
        //window.print(id);
        window.location.href = "carrito.php?vr=" + ind;
    }
    
    function vista(id){
        var ind = parseInt(id);
        //window.print(id);
        window.location.href = "vistaprod.php?vr=" + ind;
    }
    
</script>

<?php
require "footer.html";
?>