<?php include "navbar.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio</title>

    <link rel="stylesheet" href="css/estilos-index.css">

</head>
<body>
<header>
        <section class="textos-header">
            <h1>SUAAVECITO</h1>
            <h2>Disfruta de una experiencia suave</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor bienvenida">
            <h2 class="titulo">Conoce nuestros productos</h2>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="height: 500px;" src="img/vino.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Vino</h5>
                            <p>Bebida hecha de uva mediante la fermentación alcohólica de su mosto o zumo</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 500px;" src="img/Cupon1.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="height: 500px;" src="img/tequila.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tequila</h5>
                            <p>Es un aguardiente elaborado en una región de México. Se produce a partir de la destilación del mosto fermentado obtenido de una planta conocida como "agave azul"</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 500px;" src="img/Cupon2.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="height: 500px;" src="img/whisky.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Whisky</h5>
                            <p> Es una bebida alcohólica, obtenida por la destilación de la malta fermentada de cereales como cebada, trigo, centeno y maíz, y su posterior añejamiento en barriles de madera</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Nuestros productos</h2>
                <div class="galeria-satis">
                    <div class="imagen-satis">
                        <img src="img/dj70.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover1.png" alt="">
                            <p>Don Julio 70</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/va.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover1.png" alt="">
                            <p>Vodka Absolut</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/jd.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover1.png" alt="">
                            <p>Jack Daniels's</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/t10.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover1.png" alt="">
                            <p>Torres 10</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/vt.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover2.png" alt="">
                            <p>Vino Tinto</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/vb.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover2.png" alt="">
                            <p>Vino Blanco</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/vr.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover2.png" alt="">
                            <p>Vino Rosado</p>
                        </div>
                    </div>
                    <div class="imagen-satis">
                        <img src="img/ve.jpg" alt="">
                        <div class="hover-satis">
                            <img src="img/icon-hover2.png" alt="">
                            <p>Vino Espumoso</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="servicios">
            <div class="contenedor">
                <h2 class="titulo">Ofrecemos</h2>
                <div class="servicio-cont">
                    <div class="servicio-cert">
                        <img src="img/serv1.png" alt="">
                        <h3>Calidad</h3>
                        <p>Contamos con un estricto estandar de calidad, con el que aseguramos tener las mejores marcas, para que con ello puedas disfrutar solo de lo mejor.</p>
                    </div>
                    <div class="servicio-cert">
                        <img src="img/serv2.png" alt="">
                        <h3>Rapidez</h3>
                        <p>Tenemos envios a todo el mundo, con las paqueterías mas rápidas y seguras, para que obtengas tus productos seguros y en el menor tiempo posible.</p>
                    </div>
                    <div class="servicio-cert">
                        <img src="img/serv3.png" alt="">
                        <h3>Variedad</h3>
                        <p>Contamos con una gran variedad de productos, las mejores marcas, todo lo que necesitas para organizar tu reunión o para surtir tu establecimiento.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">¡Suscríbete ahora!</h2>
                <div class="suscribete">
                <form action="enviarCupon.php" class="row row-cols-lg-auto g-3 align-items-center" method="POST">
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Correo electrónico</label>
                        <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input name="correo" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary boton">Suscríbete</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php include "footer.html"; ?>