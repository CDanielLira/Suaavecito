<?php
    session_start(); 
    $servidor='localhost';
    $cuentasql='root';
    $password='';
    $bd='bdprueba1';

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