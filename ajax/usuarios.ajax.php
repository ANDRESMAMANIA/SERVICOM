<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	// Propiedad que almacena el ID del usuario a editar
	public $idUsuario;

	// Método para editar un usuario en modo AJAX
	public function ajaxEditarUsuario(){

		$item = "id_usuario";
		$valor = $this->idUsuario;

		// Llama al controlador "ControladorUsuarios" y su método "ctrMostrarUsuarios" para obtener la información del usuario
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		// Devuelve la respuesta en formato JSON
		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	// Propiedades que almacenan la información necesaria para activar un usuario
	public $activarUsuario;
	public $activarId;

	// Método para activar un usuario en modo AJAX
	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id_usuario";
		$valor2 = $this->activarId;

		// Llama al modelo "ModeloUsuarios" y su método "mdlActualizarUsuario" para actualizar el estado del usuario
		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/

	// Propiedad que almacena el nombre de usuario a validar
	public $validarUsuario;

	// Método para validar si un usuario ya existe en modo AJAX
	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		// Llama al controlador "ControladorUsuarios" y su método "ctrMostrarUsuarios" para verificar si el usuario existe
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		// Devuelve la respuesta en formato JSON
		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/

// Verifica si se ha enviado el ID del usuario para editar
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/

// Verifica si se han enviado los datos para activar un usuario
if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

// Verifica si se ha enviado el nombre de usuario a validar
if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}
