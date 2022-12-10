<?php include "navbar.php";       
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
<!DOCTYPE html>
<html>
    
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos-pagoOxxo.css">
        <?php

        function randomText($length) {
            $key="";
            $pattern = "1234567890abcdefghijkmnlopqrstuvxyz";
            for($i=0; $i<$length; $i++) {
                $key .= $pattern[rand(0,34)];
            }
            return $key;
        }

        $codigo = randomText(30);


?>
    </head>
    <body>
        <div class="con1">
            <div class="con2">
                <div class="con3">
                     <h2 class="py-3">¡Gracias por elegirnos!</h2> 
                    <br>
                    <p>Solicita al cajero del OXXO que capture los digitos que se encuentran debajo del detalle de compra. Recuerda que tienes 48 horas para realizar el pago</p>
                    <br><br>
                    <table class="tabla1">
                        <tr>
                            <td>
                                <h1>Detalles de la orden</h1>
                                <p>Nombre de la organización: Suaavecito</p>
                                <p>Alias de la organización: Suaavecito</p>
                                <p>Email administrativo: Suaavecito@gmail.com</p>
                                <p><?php
                                    if($total >= 299){
                                        echo "¡Tienes envío gratuito!";
                                    }
                                    else {
                                        echo "¡Añade $" . 299 - $total . " más a tu carrito para tener envío gratuito! <br><br>";
                                        echo "Total sin envío: $" . $total . " Envío: $100 Total: $" . $total+100;
                                        $total += 100;
                                    }
                                ?></p>
                                <h5><?php
                                    if(!empty($_GET['cupon']) && $total < 100){
                                        echo "¡Añade más productos a tu carrito para hacer válido el cupón!";
                                        $descuento = 0;
                                    }
                                    else if(!empty($_GET['cupon']) && $_GET['cupon'] == "SUAAVECITO10") {
                                        echo "¡Tienes un descuento de 10% sobre el total!";
                                        $descuento = 10;
                                    }
                                    else if(!empty($_GET['cupon']) && $_GET['cupon'] == "SUAAVECITO20") {
                                        echo "¡Tienes un descuento de 20% sobre el total!";
                                        $descuento = 20;
                                    }
                                    else if(!empty($_GET['cupon']) && $_GET['cupon'] == "SUAAVECITO100") {
                                        echo "¡Tienes un descuento de $100 sobre el total!";
                                        $descuento = 100;
                                    }
                                    else {
                                        $descuento = 0;
                                        echo "No ingresaste ningún cupón";
                                    }
                                ?></h5>
                                <h5><?php
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
                                ?></h5>
                                <h5><?php
                                echo "Total con impuestos (16%): <b>$" . $total*1.16 . "</b>";
                                ?></h5>
                                <a href="realizarpago.php"><input type="submit" value="Simular finalizar compra" class="submit-btn"></a>
                            </td>
                            <td><img src="img/oxxo.png" alt="" class="oxxo"></td>
                        </tr>
                    </table>
                    <br>
                    <h2>Codigo:</h2>
                    <h3><?php echo $codigo?></h3>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include "footer.html"; ?>