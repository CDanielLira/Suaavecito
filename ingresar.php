<?php
    require "conexion.php";
    require "navbar.php";

    $llave = "ProyectoProgramacionWeb";
    $conexion = new mysqli($servidor, $cuentasql, $password, $bd);
    $cuentaAux = "NO";

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    
    //Si tiene una sesión activa
    if(!empty($_SESSION['id'])) {
        echo "Bienvenido, " . $_SESSION['nombre'];
        $cuenta = $_SESSION['cuenta'];
        echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
        //header( "refresh:1; url=index.php");
    }
    else {
        //Si se mando información en el formulario
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $cuentaAux = $_POST["cuenta"];
            $cuenta = $_POST["cuenta"];
            $contrasena = $_POST['contrasena'];
            
            $consulta = "select * from usuarios where cuenta='" . $cuenta . "' && cast(aes_decrypt(contrasena, '" . $llave . "') as char)='" . $contrasena . "';";
            $resultado = $conexion -> query($consulta);

            //Si la consulta genera registros, se guardan los datos en la sesión
            if ($resultado -> num_rows) {
                $resultado = $resultado -> fetch_assoc();
                $bloqueada = $resultado['bloqueada'];
                if($bloqueada == 0) {
                    echo "<br>Contraseña correcta <br>";
                    $_SESSION['id'] = $resultado['id'];
                    $_SESSION['nombre'] = $resultado['nombre'];
                    $_SESSION['cuenta'] = $resultado['cuenta'];
                    $_SESSION['correo'] = $resultado['correo'];
                    $conexion->query("UPDATE usuarios SET intentos=0 WHERE cuenta='" . $cuenta . "';");
                    if(!empty($_POST['recordar'])) {
                        setcookie('usuario', $_POST['usuario'], time() + 3600);
                        setcookie('contrasena', $_POST['contrasena'], time() + 3600);
                        echo "<br><p>Cookies establecidas exitosamente</p>";
                    }
                    else {
                        setcookie('usuario', '');
                        setcookie('contrasena', '');
                        echo "<br><p>No se estableció ninguna cookie</p>";
                    }
                    //header("Location: index.php");
                    echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
                }
            }
            //Si no genera registros, la contraseña o el usuario está mal. Se le suma un intento si es la contraseña incorrecta
            else {
                echo "<script>alert('Usuario o contraseña incorrecta');</script>";
                $existe = $conexion->query("Select * from usuarios where cuenta='" . $cuenta . "';");
                if($existe->num_rows){
                    $intento = $conexion->query("SELECT intentos FROM usuarios WHERE cuenta='" . $cuenta . "';");
                    $intento = $intento->fetch_assoc();
                    $intento = $intento['intentos'];
                    $intento++;
                    $conexion->query("UPDATE usuarios SET intentos=" .$intento . " WHERE cuenta='" . $cuenta . "';");
                    if($intento == 3) {
                        $conexion->query("UPDATE usuarios SET bloqueada=1 WHERE cuenta='" . $cuenta . "';");
                    }
                }
                $cuenta = "NO";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesi&oacute;n</title>
</head>

<body>
    <?php
        $existe = $conexion->query("Select bloqueada from usuarios where cuenta='" . $cuentaAux . "';");
        if($existe->num_rows){
            $bloqueada = $existe->fetch_assoc();
            $bloqueada = $bloqueada['bloqueada'];
        }
        else {
            $bloqueada = 0;
        }
        if($bloqueada == 1) {
            ?>
            <div class="card mx-auto" style="width: 25rem;">
                <img src="img/cuentaBloqueada.png" width="30%" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Cuenta bloqueada</h5>
                    <p class="card-text">Tu cuenta está bloqueada porque se han realizado más intentos de los autorizados, presiona el siguiente botón para recuperarla.</p>
                    <?php 
                        echo "<a href=\"recuperar.php?cuenta=" . $cuentaAux . "\" class='btn btn-primary'>Recuperar cuenta</a>";
                        echo "<pre> </pre>";
                        echo "<a href='ingresar.php' class='btn btn-primary'>Ir al inicio de sesión</a>";
                    ?>
                </div>
                </div>
            <?php
        }
        else if($cuenta == 'NO'){
    ?>

    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
        <div class="row">
            <div class="offset-md-4 col-2 py-3">
                <label for="cuenta" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="cuenta" name="cuenta" value="<?php if(isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-2 py-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php if(isset($_COOKIE['contrasena'])) echo $_COOKIE['contrasena']; ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-check offset-md-4 col-2 py-3">
                <input class="form-check-input" type="checkbox" name="recordar" id="recordar">
                <label class="form-check-label" for="recordar">
                    Recordar usuario y contraseña
                </label>
            </div>
        </div>
        <?php require "captcha.php"; ?>
        <!--Cambiar a disabled para que se active el captcha-->
        <div class="row">
            <div class="offset-md-4 col-2">
                <button type="submit" class="btn btn-outline-primary" id="botonIngresar" value="submit" name="submit" disabled>Ingresar</button> 
            </div>
        </div>
    </form>
        <label class="form-check-label">¿No tienes una cuenta? <a href="registrar.php">Haz clic aquí</a> para registrarte.</label>

    <?php
        }
        else{
            echo "<a href='logout.php'>Cerrar sesi&oacute;n</a>";
        }
    ?>
</body>

</html>
<?php
require "footer.html";
?>
