<?php
    session_start(); 
    $servidor='localhost';
    $cuentasql='id19971352_suave';
    $password=' Toros12!suavecito';
    $bd='id19971352_suaavecito';

    if(!empty($_SESSION['cuenta'])){
        $usuario = $_SESSION['cuenta'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
    }
    else {
        $cuenta = "NO";
        $_SESSION['aux'] = '';
    }
?>