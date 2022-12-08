<?php
    session_start(); 
    /*$servidor='localhost';
    $cuentasql='id19971352_suave';
    $password='Toros12!suavecito';
    $bd='id19971352_suaavecito';*/

    $servidor='localhost';
    $cuentasql='root';
    $password='';
    $bd='bdprueba1';

    if(!empty($_SESSION['cuenta'])){
        $cuenta = $_SESSION['cuenta'];
        $usuario = $_SESSION['cuenta'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
        //$carrito = $_SESSION['carrito'];
    }
    else {
        $cuenta = "NO";
        $_SESSION['aux'] = '';
    }
?>
