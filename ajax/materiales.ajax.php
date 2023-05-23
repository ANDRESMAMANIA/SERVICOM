<?php

require_once "../controladores/materiales.controlador.php";
require_once "../modelos/materiales.modelo.php";

class AjaxMateriales{

	/*=============================================
	EDITAR MATERIAL
	=============================================*/

	public $idDescripcion;

	public function ajaxEditarMaterial(){

		$item = "id";
		$valor = $this->idDescripcion;

		$respuesta = ControladorMateriales::ctrMostrarMaterial($item, $valor);

		echo json_encode($respuesta);

	}


}




/*=============================================
EDITAR MATERIAL
=============================================*/
if(isset($_POST["idDescripcion"])){

	$editar = new AjaxMateriales();
	$editar -> idDescripcion = $_POST["idDescripcion"];
	$editar -> ajaxEditarMaterial();

}

