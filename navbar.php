<?php 
    require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos-navbar.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="navbar">
        <header class="header">
            <div class="logo">
                <img src="img/logo.jpeg" alt="logo de la tienda">
            </div>
            <nav class="navbar navbar-expand-lg">
                <ul class="nav-links">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="#">Acerca De</a></li>
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="#" class="btn"><button>Contactanos</button></a></li>
                    <!-- Si no está en una sesión activa-->
                    <?php
                        if(!empty($_SESSION['id'])) {
                    ?>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo "¡Hola, " . $_SESSION['nombre'] . '!';?>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="logout.php">Salir de la cuenta</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                    }
                    else {
                        //echo "No se puede: " . $_SESSION['id'];
                    ?>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Iniciar sesión
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="form-group text-center">
                                        <small><a href="ingresar.php" data-toggle="modal" data-target="#modalPassword" class="texto-oscuro">Ingresa a tu cuenta</a></small>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group text-center">
                                        <small>¿No tienes una cuenta? Haz clic para <a href="registrar.php" data-toggle="modal" data-target="#modalPassword" class="texto-oscuro">registrar una cuenta</a></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <!--<a onclick="openNav()" href="#" class="menu"><button>Menu</button></a>

            <div class="overlay" id="mobile-menu">
                <a onclick="closeNav()" href="" class="close">&times;</a>
                <div class="overlay-content">
                    <a href="#">Inicio</a>
                    <a href="#">Tienda</a>
                    <a href="#">Acerca De</a>
                    <a href="#">Ayuda</a>
                    <a href="#">Contactanos</a>
                </div>
            </div>-->
        </header>
        <script type="text/javascript" src="js/nav.js"></script>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>