<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/materiales.controlador.php";

require_once "modelos/conexion.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/materiales.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->crtPlantilla();

?>
<?php
?>