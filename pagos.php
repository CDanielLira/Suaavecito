<?php include "navbar.php" ?>
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
        <form action="examen.php">
           <div class="row">
               <h3 class="product">PAGO CON TARJETA</h3>
               <p>Usted esta realizando la compra de sus <b>productos</b></p>
               <hr>
           </div>
            <div class="row">
                <div class="col">
                    <h3 class="title">Dirección de Envio</h3>
                    <div class="inputBox">
                        <span>Nombre completo :</span>
                        <input type="text" placeholder="Martin García" required>
                    </div>
                    <div class="inputBox">
                        <span>E-mail :</span>
                        <input type="email" placeholder="ejemplo@ejemplo.com" required>
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
                        <span>Tarjetas Aceptadas :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Nombre en la Tarjeta :</span>
                        <input type="text" placeholder="Martin G." required>
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
                </div>
            </div>
            <input type="submit" value="Continuar compra" class="submit-btn">
        </form>
    </div>
    </header>
    

</body>

</html>
<?php include "footer.html" ?>