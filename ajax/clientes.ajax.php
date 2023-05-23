<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTES
	=============================================*/

	public $idCi;

	public function ajaxEditarClientes(){

		$item = "id";
		$valor = $this->idCi;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR CLIENTES
	=============================================*/

	public $activarCi;
	public $activarId;


	public function ajaxActivarClientes(){

		$tabla = "clientes";

		$item1 = "estado";
		$valor1 = $this->activarCi;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR CLIENTES
	=============================================*/

	public $validarCi;

	public function ajaxValidarClientes(){

		$item = "ci";
		$valor = $this->validarCi;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CLIENTES
=============================================*/
if(isset($_POST["idCi"])){

	$editar = new AjaxClientes();
	$editar -> idCi = $_POST["idCi"];
	$editar -> ajaxEditarClientes();

}

/*=============================================
ACTIVAR CLIENTES
=============================================*/

if(isset($_POST["activarCi"])){

	$activarCi = new AjaxClientes();
	$activarCi -> activarCi = $_POST["activarCi"];
	$activarCi -> activarId = $_POST["activarId"];
	$activarCi -> ajaxActivarClientes();

}

/*=============================================
VALIDAR NO REPETIR CLIENTES
=============================================*/

if(isset( $_POST["validarCi"])){

	$valCi = new AjaxClientes();
	$valCi -> validarCi = $_POST["validarCi"];
	$valCi -> ajaxValidarClientes();

}
?>