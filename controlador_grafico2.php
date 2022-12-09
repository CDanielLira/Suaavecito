<?php
    require 'modelo_grafico.php';

    $MG = new Modelo_Grafico();
    $consulta = $MG -> TraerDatosGraficoBar(2);
    echo json_encode($consulta);
?>