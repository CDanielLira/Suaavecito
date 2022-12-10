<?php
    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $destino = $_POST['correo'];
    $asunto = "Cupon de Descuento";
    $mensaje = "<h1>Felicidades</h1>
                <p>Acabas de recibir un codigo de descuento que podras aplicar en tu primer compra</p><br>
                <p>Usa el codigo: <b>SUAAVECITO100</b> y obtendrás un descuento de $100 en tu primer compra</p><br>
                <p>Att. Equipo de trabajo SUAAVECITO</p>";

    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Port = 587;
    $mail->Username='phpmailerrafa@gmail.com';
    $mail->Password='xntnhwqojmiptpya';
    $mail->SMTPSecure = 'tls';
    
    $mail->setFrom('phpmailerrafa@gmail.com', 'Cupon de Descuento');
    $mail->addAddress($destino);
    $mail->Subject = $asunto;
    $mail->isHTML(true);
    $mail->Body = $mensaje;
        
    if($mail->send()){
        echo "<script>alert('El correo se envio exitosamente')</script>";
        echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
    }else{
        echo "<script>alert('Error: ',$mail->ErrorInfo)</script>";
        echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
    }  
?>
