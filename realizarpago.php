<?php
    include "conexion.php";
    $conexion -> query("DELETE from carrito where idus='" . $usuario . "'");
    echo "Pago realizado";
    echo "<script>setTimeout(\"location.href='index.php'\",1000)</script>";
?>