<?php
    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $destino = "phpmailerrafa@gmail.com";
    $asunto = "Contacto";
    $mensaje = "<h1>".$_POST['nombre']." ".$_POST['apellido']."</h1>
                <p>".$_POST['mensaje']."</p>
                <p>Att ".$_POST['correo']."</p>";

    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Port = 587;
    $mail->Username='phpmailerrafa@gmail.com';
    $mail->Password='xntnhwqojmiptpya';
    $mail->SMTPSecure = 'tls';
    
    $mail->setFrom('phpmailerrafa@gmail.com', 'Contacto');
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

    $destino = $_POST['correo'];
    $asunto = "Confirmacion";
    $mensaje = "<h1>Se ha enviado tu mensaje</h1>
                <p>Pronto obtendras respuesta</p><br>
                <p>Att. equipo de trabajo SUAAVECITO</p>";

    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Port = 587;
    $mail->Username='phpmailerrafa@gmail.com';
    $mail->Password='xntnhwqojmiptpya';
    $mail->SMTPSecure = 'tls';
    
    $mail->setFrom('phpmailerrafa@gmail.com', 'Confirmacion');
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
