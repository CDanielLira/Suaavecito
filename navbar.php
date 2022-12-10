<?php 
    require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos-navbar.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpeg">
    <script src="https://kit.fontawesome.com/ade620492b.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="barra">
        <header class="header">
            <div class="logo">
                <a href="index.php"><img src="img/logo.jpeg" alt="logo de la tienda"></a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="tienda.php">Tienda</a></li>
                <li><a href="Acerca de.php">Acerca De</a></li>
                <li><a href="Ayuda.php">Ayuda</a></li>
                <li><a href="contacto.php" class="btn"><button>Contáctanos</button></a></li>
                <!-- Si no está en una sesión activa-->
                <?php
                    if(!empty($_SESSION['id']) && $usuario != 'admin') {
                        $carritoProductos = 0;
                        $resultado = $conexion -> query("SELECT COUNT(*) AS total FROM carrito WHERE idus='" . $usuario . "';");
                        if ($resultado -> num_rows) {
                            $resultado = $resultado -> fetch_assoc();
                            $carritoProductos = $resultado['total'];
                        }
                ?>
                <li>
                    <div class="btn-group btn">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "¡Hola, " . $_SESSION['nombre'] . '!';?>
                        </button>
                        <ul class="dropdown-menu" style="background: #6e1313; text-align:center;">
                            <li>
                                <a href="carrito.php">Ir al carrito</a>
                            </li>
                            <li>
                                <a href="logout.php">Salir de la cuenta</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="carrito.php"><i style="color: white;" class="fa-solid fa-cart-shopping"><?php echo $carritoProductos?></i></a></li>
                <?php
                    }
                    else if(!empty($_SESSION['cuenta']) && $usuario == 'admin'){
                ?>
                <li>
                    <div class="btn-group btn">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "Administrador";?>
                        </button>
                        <ul class="dropdown-menu" style="background-color: #6e1313; text-align:center;">
                            <li>
                                <a href="administrador.php">Ver gráficas</a>
                            </li>
                            <li>
                                <a href="altaproducto.php">Nuevo producto</a>
                            </li>
                            <li>
                                <a href="modifica.php">Modificar producto</a>
                            </li>
                            <li>
                                <a href="eliminaproducto.php">Eliminar producto</a>
                            </li>
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
                    <div class="btn-group btn">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inicia sesión
                        </button>
                        <ul class="dropdown-menu" style="background-color: #6e1313; text-align:center;">
                            <li>
                                <div class="form-group text-center">
                                    <small><a href="ingresar.php" data-toggle="modal" data-target="#modalPassword" class="texto-oscuro">Ingresa a tu cuenta</a></small>
                                </div>
                            </li>
                            <li>
                                <div class="form-group text-center">
                                    <small style="color: gray;">¿No tienes una cuenta? <a href="registrar.php" data-toggle="modal" data-target="#modalPassword" class="texto-oscuro">Registra una cuenta</a></small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
            <a onclick="openNav()" href="#" class="menu"><button>Menu</button></a>
            <div class="overlay" id="mobile-menu">
                <a onclick="closeNav()" href="" class="close">&times;</a>
                <div class="overlay-content">
                    <a href="index.php">Inicio</a>
                    <a href="#">Tienda</a>
                    <a href="Acerca de.php">Acerca De</a>
                    <a href="Ayuda.php">Ayuda</a>
                    <a href="contacto.php">Contactanos</a>
                    <a href="ingresar.php">Inicia Sesión</a>
                </div>
            </div>
        </header>
        <script type="text/javascript" src="js/nav.js"></script>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>