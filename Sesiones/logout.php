<?php 
    session_start();
    // remove all session variables
    echo "Murieron las variables del usuario: " . $_SESSION['cuenta'];
    session_unset();

    // destroy the session
    session_destroy();
    echo "<br> Murio la sesion ";
    echo "<a href='ingresar.php'>Iniciar sesión</a>";
    //header("Location: index.php");
?>