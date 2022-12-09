<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <link rel="stylesheet" href="css/estilos-ayuda.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"><!-- CSS only -->
    <?php include "navbar.php"; ?>
</head>

<body>
    <header class="header" id="inicio">
        <img class="hamburguer" src="img/bx-menu-alt-right.svg" alt="">
        <nav class="menu-navegacion">
            <a href="#inicio">Introduccion</a>
            <a href="#servicio">Valores</a>
            <a href="#galeria">Galeria</a>
            <a href="#expertos">Nosotros</a>
        </nav>
        <div class="contenedor head">
            <h1 class="titulo">AYUDA</h1>
            <p class="copy">Aqui podemos resolver algunas de sus preguntas, como tambien los pasos de compra</p>
        </div>
    </header>
    <main>
        <section class="services contenedor" id="servicio">
            <h2 class="subtitulo">PASOS PARA LA COMPRA</h2>
            <div class="contenedor-servicio">
               <img src="img/AyudaImg.png" alt="">
                <div class="checklist-servicio">
                    <div class="service">
                        <h3 class="n-service"><span class="number">1</span></h3>
                        <p>Entre a nuestra pagina <a href="index.php">SUAAVECITO</a>
                            y seleccione los productos que le gusten</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">2</span></h3>
                        <p>Cuando tenga los productos seleccinados, haga click en
                            "Añadir a carrito" todos los productos que compre</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">3</span></h3>
                        <p>Cuando ya este listo haga click
                            en el carrito de compras</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">4</span></h3>
                        <p>Precione continuar</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">5</span></h3>
                        <p>Llene lo que se le indica, para que su compra se
                            realice correctamente</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">6</span></h3>
                        <p>Espere unos cuantos dias o semanas para que
                            le llegue su pedido</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">7</span></h3>
                        <p>Disfrute</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="gallery" id="galeria">
            <h2 style=" text-align: center">PREGUNTAS FRECUENTES</h2>
            <div class="accordion" id="accordionPanelsStayOpenExample" style="margin: 30px;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            ¿NUESTRAS COMPRARS SON CONFIABLES?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <strong>Esta pagina si es confiable.</strong> Pero porque solo somos un proyecto universitario.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            ¿QUE METODOS TENGO PARA GARA?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <strong>Solo una por el momento</strong> El unico metodo de pago que tenemos es la tarjeta de credito.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            ¿SI LLEGAN NUESTROS PRODUCTOS?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong>No.</strong> Porque solo es un proyecto univeritario.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            ¿VAN AGREGAR MAS PRODUCTOS?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong>Si.</strong> Como apenas estamos empezando tenemos muy poquitos productos, pero iremos agrgando productos.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            ¿VENDEN A MENORES?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong>No.</strong> Al hacer los pagos en tarjeta, el encargado de la tarejeta con la que pagas es el responsabe del alcohol que enviamos.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            ¿TIENEN UNA TIENDA FISICA?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong>No.</strong> Por el momento todavia no.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/menu.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include "footer.html"; ?>
</html>
