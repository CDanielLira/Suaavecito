<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos-navbar.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpeg">
</head>
<body>
    <div class="navbar">
        <header class="header">
            <div class="logo">
                <img src="img/logo.jpeg" alt="logo de la tienda">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="Acerca de.php">Acerca De</a></li>
                    <li><a href="Ayuda.php">Ayuda</a></li>
                </ul>
            </nav>
            <a href="#" class="btn"><button>Contactanos</button></a>

            <a onclick="openNav()" href="#" class="menu"><button>Menu</button></a>

            <div class="overlay" id="mobile-menu">
                <a onclick="closeNav()" href="" class="close">&times;</a>
                <div class="overlay-content">
                    <a href="#">Inicio</a>
                    <a href="#">Tienda</a>
                    <a href="Acerca de.php">Acerca De</a>
                    <a href="Ayuda.php">Ayuda</a>
                    <a href="#">Contactanos</a>
                </div>
            </div>
        </header>
        <script type="text/javascript" src="js/nav.js"></script>
    </div>
</body>
</html>