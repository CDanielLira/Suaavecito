<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca De</title>
    <link rel="stylesheet" href="css/estilos-acercade.css">
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
            <h1 class="titulo">Acerca de Suaavecito</h1>
            <p class="copy">Somos una tienda dedicada a darte los mejores productos al mejor precio, basados en un alto estandar de calidad, asociados con las mejores marcas y garantizando el mejor de los servicios.
                Todo a disposición de un clic... además, de que siempre contamos con grandes promociones para que logres ahorrar lo maximo posible y tengas todo lo que deseas. Las mejores bebidas solo las encontrarás aquí..</p>
        </div>

    </header>
    <main>
        <section class="services contenedor" id="servicio">
            <h2 class="subtitulo">Somos Suaavecito</h2>
            <div class="contenedor-servicio">
                <img src="img/Online%20shopping%20_Outline.svg" alt="">
                <div class="checklist-servicio">
                    <div class="service">
                        <h3 class="n-service"><span class="number">1</span>Mision</h3>
                        <p>Nuestra mision es poder compartir al mundo la gran variedad de culturas y tradiciones
                            por medio de las bebidas que reperesetan cada pais</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">2</span>Vision</h3>
                        <p>Nuestra vision es proporcionar la cultura y tradicion del mundo</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">3</span>Objetivo</h3>
                        <p>Nuestro objetivo es ser la tienda de licores y vinos en linea mas grande del mundo</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="gallery" id="galeria">
            <div class="contenedor">
                <h2 class="subtitulo">Galeria</h2>
                <div class="contenedor-galeria">
                    <img src="img/bar2.jpg" class="img-galeria" alt="">
                    <img src="img/bar3.jpg" class="img-galeria" alt="">
                    <img src="img/people.jpg" class="img-galeria" alt="">
                    <img src="img/drink3.jpg" class="img-galeria" alt="">
                    <img src="img/p-1.jpg" class="img-galeria" alt="">
                    <img src="img/galery6.jpg" class="img-galeria" alt="">
                </div>
            </div>
        </section>
        <div class="imagen-light">
            <img src="img/bx-window-close.svg" alt="" class="close">
            <img src="" alt="" class="agregar-imagen">
        </div>
        <section class="contenedor" id="expertos">
            <h2 class="subtitulo">Nosotros:</h2>
            <section class="experts">
                <div class="cont-expert">
                    <img style="height: 300px;" src="img/dani.jpg" alt="">
                    <h3 class="n-expert">Main Developer</h3>
                </div>
                <div class="cont-expert">
                    <img style="height: 300px;" src="img/rafa.jpg" alt="">
                    <h3 class="n-expert">CEO</h3>
                </div>
                <div class="cont-expert">
                    <img style="height: 300px;" src="img/andrew.jpg" alt="">
                    <h3 class="n-expert">Staff</h3>
                </div>
            </section>
        </section>
    </main>
    <script src="js/menu.js"></script>
    <script src="js/lightbox.js"></script>
</body>
<?php include "footer.html"; ?>

</html>