<?php
    require "conexion.php";
    require "navbar.php";

    $llave = "ProyectoProgramacionWeb";
    $conexion = new mysqli($servidor, $cuentasql, $password, $bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos-navbar.css">
    <title>Registrar cuenta</title>

</head>
<header>
    <title>Registro</title>
</header>
<?php    
    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';
    
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Enviar correo con PHPMailer
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["password1"] == $_POST["password2"]) {
        $correo = $_POST["correo"];
        $nombre = $_POST["nombre"];
        //$apellidoP = $_POST["apellidoP"];
        //$apellidoM = $_POST["apellidoM"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password1"];
        $id = $_POST["ID"];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'phpmailerrafa@gmail.com';                  
            $mail->Password   = 'xntnhwqojmiptpya';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('phpmailerrafa@gmail.com', 'Suavecito');
            $mail->addAddress($correo);

            $mail->isHTML(true);
            $mail->Subject = 'Bienvenida';
            $mail->Body    = '<h2>¡Bienvenido a Suavecito!</h2>
                              <p>Gracias por registrarte, ¡te esperan grandes sorpresas!</p>
                              <br>
                              <p>Agregar mensaje sobre borracheras y así</p>
                              <br>
                              <hr>
                              <small>Recibiste este correo porque se introdujo ' . $correo . ' para suscribirse a nuestro sitio, si no fuiste tú, 
                              envíanos un mensaje para eliminar tu suscripción.</small>';
            #This is the body in plain text for non-HTML mail clients
            $mail->AltBody = 'Bienvenido a nuestro sitio';

            if($mail->send()){
                echo "<script>alert('El registro se creó exitosamente')</script>";
                //echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
            }else{
                echo "<script>alert('Error: ',$mail->ErrorInfo)</script>";
                echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
            }
        }
        catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
        }
        
        $registrar = "INSERT INTO usuarios (id, nombre, cuenta, correo, contrasena, bloqueada) VALUES ('" . $id . "', '" . $nombre . "', '" . $usuario . "', '" . $correo . "', AES_ENCRYPT('". $password . "', '" . $llave . "'), 0);";
        $resultado = $conexion -> query($registrar);
        echo "Cuenta registrada correctamente. Se te redireccionará al menú automáticamente.<br><a href='index.php'>Ir al menú ahora</a>";
        header("refresh:3; url=index.php");
        
    }
    else {
        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["password1"] != $_POST["password2"]) {
            $nombre = $_POST["nombre"];
            //$apellidoP = $_POST["apellidoP"];
            //$apellidoM = $_POST["apellidoM"];
            $usuario = $_POST["usuario"];
            $correo = $_POST["correo"];
            $id = $_POST["ID"];
            ?>
            <script>alert("Las contraseñas no coinciden");</script>
<?php
        }
        else {
            $nombre = '';
            //$apellidoP = '';
            //$apellidoM = '';
            $usuario = '';
            $correo = '';
            $id = '';
        }
?>


<body>
    <div class="contenedor py-5 px-5">
        <div class="formulario">
            <div class="titulo">
                <h1>Registrar nueva cuenta</h1>
                <hr>
            </div>
            <div class="info">
                <form class="row centrar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row">
                        <div class="col-3 py-3"></div>
                        <div class="col-3 py-3">
                            <label for="inputID" class="form-label">ID</label>
                            <input type="number" class="form-control" id="inputID" name="ID" value="<?php echo '' . $id ?>" required>
                        </div>
                        <div class="col-3 py-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="inputNombre" name="nombre" value="<?php echo '' . $nombre ?>" required>
                        </div>
                    </div>
                    <!--<div class="col-3 py-3">
                        <label for="inputAP" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" id="inputAP" name="apellidoP" value="<?php echo '' . $apellidoP ?>" required>
                    </div>
                    <div class="col-3 py-3">
                        <label for="inputAM" class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" id="inputAM" name="apellidoM" value="<?php echo '' . $apellidoM ?>" required>
                    </div>-->
                    <div class="row">
                        <div class="col-3 py-3"></div>
                        <div class="col-3 py-3">
                            <label for="usuario" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo '' . $usuario ?>" required>
                        </div>
                        <div class="col-md-3 py-3">
                            <label for="inputCorreo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="inputCorreo" name="correo" value="<?php echo '' . $correo ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 py-3"></div>
                        <div class="col-md-3 py-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" name="password1" required>
                        </div>
                        <div class="col-md-3 py-3">
                            <label for="inputPasswordConfirm" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="password2" required>
                        </div>
                    </div>
                    <div class="py-3 py-3 btn">
                        <button type="button submit" data-bs-target="#error" data-bs-toggle="modal" class="btn btn-primary boton" name="registrar">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
    }
    require "footer.html";
?>
