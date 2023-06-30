<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ingresoequipo.controlador.php";
require_once "controladores/ventaservicios.controlador.php";

require_once "modelos/conexion.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ingresoequipo.modelo.php";
require_once "modelos/ventaservicio.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->crtPlantilla();

?>
<?php
?>