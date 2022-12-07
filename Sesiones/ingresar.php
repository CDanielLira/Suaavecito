<?php
    require "conexion.php";
    $llave = "ProyectoProgramacionWeb";
    $conexion = new mysqli($servidor,$cuentasql,$password,$bd);
    $cuentaAux = "NO";

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    
    //Si tiene una sesión activa
    if(!empty($_SESSION['id'])) {
        echo "Bienvenido, " . $_SESSION['nombre'];
        $cuenta = $_SESSION['cuenta'];
    }
    else {
        echo "No está la session<br>";
        
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
                    header("Location: ingresar.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            echo "Tu cuenta está bloqueada, para recuperarla <a href=\"recuperar.php?cuenta=" . $cuentaAux . "\"> haz clic aquí</a>";
            echo "<br><a href='ingresar.php>Ir al inicio de sesión</a>";
        }
        else if($cuenta == 'NO'){
    ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
                Nombre de usuario:
                <input type="text" id="cuenta" name="cuenta" value="<?php if(isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>" required>
                <br>
                Contraseña:
                <input type="password" id="contrasena" name="contrasena" value="<?php if(isset($_COOKIE['contrasena'])) echo $_COOKIE['contrasena']; ?>" required>
                <br>
                <input type="checkbox" name="recordar">
                Recordar usuario y contraseña
                <br>
                <br>
                <?php require "Captcha.php"; ?>
                <button type="submit" id="botonIngresar" value="submit" name="submit" disabled>Ingresar</button>                
            </form>
            ¿No tienes una cuenta? <a href="registrar.php">Haz clic aquí</a> para registrarte.
    
    <?php
        }
        else{
            echo "<a href='logout.php'>Cerrar sesi&oacute;n</a>";
        }
    ?>
</body>

</html>
