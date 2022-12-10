<?php
    session_start(); 
    $servidor='localhost';
    $cuentasql='id19971352_suave';
    $password='Toros12!suavecito';
    $bd='id19971352_suaavecito';

    /*$servidor='localhost';
    $cuentasql='root';
    $password='';
    $bd='bdprueba1';*/

    $conexion = new mysqli($servidor, $cuentasql, $password, $bd);
    
    if ($conexion->connect_errno){
        die('Error en la conexion');
    }

    if(!empty($_SESSION['cuenta'])){
        $cuenta = $_SESSION['cuenta'];
        $usuario = $_SESSION['cuenta'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
    }
    else {
        $cuenta = "NO";
        $_SESSION['aux'] = '';
    }
?>

<?php
    class conexion{
        private $servidor;
        private $cuentasql;
        private $password;
        private $bd;
        public $conexion;
        public function __construct(){
            
            $this->servidor='localhost';
            $this->cuentasql='id19971352_suave';
            $this->password='Toros12!suavecito';
            $this->bd='id19971352_suaavecito';
            
            /*$this->servidor = "localhost";
            $this->cuentasql = "root";
            $this->password = "";
            $this->bd = "bdprueba1";*/
        }
        function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->cuentasql,$this->password,$this->bd);
		}
		function cerrar(){
			$this->conexion->close();	
		}
    }

?>
