<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes {

    /*=============================================
    EDITAR CLIENTES
    =============================================*/

    // Propiedad que almacena el ID del cliente a editar
    public $idCi;

    public function ajaxEditarClientes() {
        // Se obtiene el cliente utilizando el controlador y el ID proporcionado
        $item = "id_cliente";
        $valor = $this->idCi;
        $respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

        // Se devuelve la respuesta en formato JSON
        echo json_encode($respuesta);
    }

    /*=============================================
    ACTIVAR CLIENTES
    =============================================*/

    // Propiedades que almacenan el estado y el ID del cliente a activar
    public $activarCi;
    public $activarId;

    public function ajaxActivarClientes() {
        $tabla = "clientes";

        // Se actualiza el estado del cliente utilizando el modelo y los valores proporcionados
        $item1 = "estado";
        $valor1 = $this->activarCi;
        $item2 = "id_cliente";
        $valor2 = $this->activarId;
        $respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);
    }

    /*=============================================
    VALIDAR NO REPETIR CLIENTES
    =============================================*/

    // Propiedad que almacena el número de CI a validar
    public $validarCi;

    public function ajaxValidarClientes() {
        // Se verifica si existe un cliente con el mismo número de CI utilizando el controlador
        $item = "ci";
        $valor = $this->validarCi;
        $respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

        // Se devuelve la respuesta en formato JSON
        echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR CLIENTES
=============================================*/
if (isset($_POST["idCi"])) {
    // Se instancia la clase AjaxClientes y se asigna el valor del ID del cliente
    $editar = new AjaxClientes();
    $editar->idCi = $_POST["idCi"];
    $editar->ajaxEditarClientes();
}

/*=============================================
ACTIVAR CLIENTES
=============================================*/

if (isset($_POST["activarCi"])) {
    // Se instancia la clase AjaxClientes y se asignan los valores de estado y ID del cliente
    $activarCi = new AjaxClientes();
    $activarCi->activarCi = $_POST["activarCi"];
    $activarCi->activarId = $_POST["activarId"];
    $activarCi->ajaxActivarClientes();
}

/*=============================================
VALIDAR NO REPETIR CLIENTES
=============================================*/

if (isset($_POST["validarCi"])) {
    // Se instancia la clase AjaxClientes y se asigna el valor del número de CI
    $valCi = new AjaxClientes();
    $valCi->validarCi = $_POST["validarCi"];
    $valCi->ajaxValidarClientes();
}
