<?php
    require "conexion.php";
    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $llave = "ProyectoProgramacionWeb";
    
    $conexion = new mysqli($servidor, $cuentasql, $password, $bd);
    
    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    function contrasenaTemporal($longitud) {
        $clave = "";
        $patron = "1234567890qwertyuiopasdfghjklzxcvbnm_-@:";
        for($i = 0; $i < $longitud; $i++) {
            $clave .= $patron[rand(0,39)];
        }
        return $clave;
    }

    //Si tiene una sesión activa
    if(!empty($_SESSION['id'])) {
        echo "No puedes acceder a esta página, " . $_SESSION['nombre'];
    }
    else {
        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['codigo'] == $_POST['contrasena'] && $_POST["password1"] == $_POST["password2"]) {
            //UPDATE usuarios SET contrasena=AES_ENCRYPT('contra', 'ProyectoProgramacionWeb') WHERE cuenta='FabianME';
            $conexion->query("UPDATE usuarios SET contrasena=AES_ENCRYPT('" . $_POST['password1'] . "', '" . $llave ."') WHERE cuenta='" . $_POST["cuenta"] . "';");
            $conexion->query("UPDATE usuarios SET intentos=0, bloqueada=0 WHERE cuenta='" . $_POST["cuenta"] . "';");
        }
        else {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $cuenta = $_POST['cuenta'];
            }
            else {
                $cuenta = $_GET['cuenta'];
                echo "Usuario: " . $cuenta . "<br>";

                $contrasena = contrasenaTemporal(8);

                $correo = $conexion->query("SELECT correo FROM usuarios WHERE cuenta='" . $cuenta . "';");
                if($correo->num_rows){
                    $correo = $correo->fetch_assoc();
                    $correo = $correo['correo'];

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
                        $mail->Subject = 'Recuperar cuenta';
                        $mail->Body    = '<h2>Recuperacion de cuenta</h2>
                                          <p>Tu cuenta está bloqueada, ingresa el siguiente código para desbloquearla y crear una nueva contraseña:</p>

                                          <h3>' . $contrasena . '</h3>';

                        #This is the body in plain text for non-HTML mail clients
                        $mail->AltBody = 'Recuperar cuenta';

                        if($mail->send()){
                            echo "<script>alert('Verifica tu correo electrónico')</script>";
                        }else{
                            echo "<script>alert('Error: ',$mail->ErrorInfo)</script>";
                            echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
                        }

                    }
                    catch (Exception $e) {
                        echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                else {
                    echo "No se encontró el nombre de usuario";
                }
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
    <title>Recuperar cuenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["password1"] != $_POST["password2"]) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        echo "<a href=\"recuperar.php?cuenta=" . $cuenta . "\">Enviar nuevo código</a>";
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['codigo'] != $_POST["contrasena"]) {
        echo "<script>alert('El código no coincide');</script>";
        echo "<a href=\"recuperar.php?cuenta=" . $cuenta . "\">Enviar nuevo código</a>";
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['codigo'] == $_POST['contrasena'] && $_POST["password1"] == $_POST["password2"])
        echo "¡Felicidades! Tu contraseña ha sido restablecida. <a href='ingresar.php'>Ingresa a tu cuenta</a>";
    else {
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
        Ingresa el código que se encuentra en tu correo (<?php echo $contrasena ?>):
        <input type="text" name="codigo" require>
        <br>
        Nueva contraseña:
        <input type="password" name="password1" require>
        <br>
        Confirmar contraseña:
        <input type="password" name="password2" required>
        <br>
        <input type="text" value="<?php echo $cuenta ?>" name="cuenta" hidden>
        <input type="text" value="<?php echo $contrasena ?>" name="contrasena" hidden>
        <button type="submit" value="submit" name="submit">Recuperar cuenta</button>
        </form>
    <?php
    }
    ?>    
    
</body>

</html>










