<?php include "navbar.php";
    if($_POST['tarjeta'] == "OXXO" && !empty($_POST['cupon'])) {
        echo "<script>setTimeout(\"location.href='pago_oxxo.php?cupon=".$_POST['cupon']."'\",1)</script>";
    }
    else if($_POST['tarjeta'] == "OXXO") {
        echo "<script>setTimeout(\"location.href='pago_oxxo.php'\",1)</script>";
    }

    $sql = "select * from carrito where idus = '$usuario'";
    $resultado = $conexion -> query($sql);
    $total = 0;
    while($fila = $resultado -> fetch_assoc()){
        $id = $fila['idprod'];
        $sql3 = "select * from productos where idproducto = '$id'";
        $resultado3 = $conexion -> query($sql3);
        while( $fila2 = $resultado3 -> fetch_assoc()){
            $total += $fila2['precio'];
            $total -= $fila2['descuento'];
        }
    }//fin while

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="css/estilos-pagos.css">
</head>

<body>
    <header>
    <div class="contenedor">
        <form action="realizarpago.php">
           <div class="row">
               <h3 class="product">PAGO CON TARJETA <?php echo $_POST['tarjeta']?></h3>
               <p>Usted esta realizando la compra de sus <b>productos</b></p>
               <hr>
           </div>
            <div class="row">
                <div class="col">
                    <h3 class="title">Dirección de Envio</h3>
                    <div class="inputBox">
                        <span>Nombre completo :</span>
                        <input type="text" value="<?php echo $nombre?>" required>
                    </div>
                    <div class="inputBox">
                        <span>E-mail :</span>
                        <input type="email" value="<?php echo $correo?>" required>
                    </div>
                    <div class="inputBox">
                        <span>Dirección :</span>
                        <input type="text" placeholder="calle - numero - colonia" required>
                    </div>
                    <div class="inputBox">
                        <span>Municipio :</span>
                        <input type="text" placeholder="Aguascalientes" required>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Estado :</span>
                            <input type="text" placeholder="Aguascalientes" required>
                        </div>
                        <div class="inputBox">
                            <span>Código Postal :</span>
                            <input type="text" placeholder="20924" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Forma de Pago</h3>
                    <div class="inputBox">
                    </div>
                    <div class="inputBox">
                        <span>Nombre en la Tarjeta :</span>
                        <input type="text" value="<?php echo $nombre?>" required>
                    </div>
                    <div class="inputBox">
                        <span>Numero de Tarjeta de Credito :</span>
                        <input type="number" placeholder="1111-2222-3333-4444" required>
                    </div>
                    <div class="inputBox">
                        <span>Mes de Expiración :</span>
                        <input type="text" placeholder="enero" required>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Año de Expiración :</span>
                            <input type="number" placeholder="2022" required>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234" required>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                        <h6><?php
                                if($total >= 299){
                                    echo "¡Tienes envío gratuito!";
                                }
                                else {
                                    echo "¡Añade $" . 299 - $total . " más a tu carrito para tener envío gratuito!<br>";
                                    echo "Total sin envío: $" . $total . " Envío: $100 Total: $" . $total+100;
                                    $total += 100;
                                }
                            ?></h6>
                        </div>
                        <div class="inputBox">

                        </div>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <h6><?php
                                if(!empty($_POST['cupon']) && $total < 100){
                                    echo "¡Añade más productos a tu carrito para hacer válido el cupón!";
                                    $descuento = 0;
                                }
                                else if(!empty($_POST['cupon']) && $_POST['cupon'] == "SUAAVECITO10") {
                                    echo "¡Tienes un descuento de 10% sobre el total!";
                                    $descuento = 10;
                                }
                                else if(!empty($_POST['cupon']) && $_POST['cupon'] == "SUAAVECITO20") {
                                    echo "¡Tienes un descuento de 20% sobre el total!";
                                    $descuento = 20;
                                }
                                else if(!empty($_POST['cupon']) && $_POST['cupon'] == "SUAAVECITO100") {
                                    echo "¡Tienes un descuento de $100 sobre el total!";
                                    $descuento = 100;
                                }
                                else {
                                    $descuento = 0;
                                    echo "No ingresaste ningún cupón";
                                }
                            ?></h6>
                        </div>
                        <div class="inputBox">
                            <h6><?php
                                if($descuento == 10 || $descuento == 20) {
                                    echo "<span style='text-decoration:line-through;'>$". $total ."</span>";
                                    $total -= ($descuento / 100) * $total;
                                    echo "<span><h5>$". $total ."</h5></span>";
                                }
                                else if($descuento == 100) {
                                    echo "<span style='text-decoration:line-through;'>$". $total ."</span>";
                                    $total -= 100;
                                    echo "<span><h5>$". $total ."</h5></span>";
                                }
                                else {
                                    echo "<span><h5>$". $total ."</h5></span>";
                                }
                            ?></h6>
                            <h5><?php
                                echo "Total con impuestos (16%): <b>$" . $total*1.16 . "</b>";
                            ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Finalizar compra" class="submit-btn">
        </form>
    </div>
    </header>
    

</body>

</html>
<?php include "footer.html" ?>