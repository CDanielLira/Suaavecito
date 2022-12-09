<?php
    class Modelo_Grafico{
        private $conexion;
        function __construct()
        {
            require_once('../conexion.php');
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }


        function TraerDatosGraficoBar($opc){
            if($opc == 1){
                $sql = "Select * from ventas";
                $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {

                    while ($constulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $constulta_VU;
                    }
                    return $arreglo;
                    $this->conexion->cerrar();
                }
            }
            if($opc == 2){
                $sql = "Select idproducto, existencia from productos";
                $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {

                    while ($constulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $constulta_VU;
                    }
                    return $arreglo;
                    $this->conexion->cerrar();
                }
            }
        }
    }
?>
