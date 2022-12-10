<!DOCTYPE html>
<html>
    
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos-pagoOxxo.css">
        <?php include "navbar.html"; ?>
        <?php

        function randomText($length) {
            $key="";
            $pattern = "1234567890abcdefghijkmnlopqrstuvxyz";
            for($i=0; $i<$length; $i++) {
                $key .= $pattern[rand(0,36)];
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
                     <h2>¡Gracias por elegirnos!</h2> 
                    <br>
                    <p>solicita al canero del OXXO que capture los digitos que se encuentran debajo del codigo de barras . Recuerda que tienes 48 horas para pagar el recibo</p>
                    <br><br><br><br>
                    <table class="tabla1">
                        <tr>
                            <td>
                                <h1>Detalles de la orden</h1>
                                <p>Nombre de la organizacion: Suaavecito</p>
                                <p>Alias de la organizacion: Suaavecito</p>
                                <p>Email adminisrativo:Suaavecito@gmail.com</p>
                            </td>
                            <td><img src="img/oxxo.png" alt="" class="oxxo"></td>
                        </tr>
                     </table>
                     <br><br>
                     <h2>Codigo:</h2>
                     <h3><?php echo $codigo?></h3>
                     <br><br><br>
                     <p>Te recordamos que una vez realizando el pago en el OXXO, el pago se hara efectivo 24 horas despues y seras notificado via correo electronico.</p>
                     
                </div>
               

            </div>
        </div>
    </body>
    <?php include "footer.html"; ?>
</html>