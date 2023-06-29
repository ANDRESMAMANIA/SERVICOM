<?php

/** 
 * 
 */
class ControladorClientes

{

   /*=============================================
	REGISTRO DE CLIENTE
	=============================================*/
   static public function ctrCrearCliente()
   {
      if (isset($_POST["nuevoCi"])) {
         if (
            preg_match('/^[0-9]+$/', $_POST["nuevoCi"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreCliente"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoCliente"]) &&
            preg_match('/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/', $_POST["nuevoEmail"])


         ) {

            $tabla = "clientes";
            $datos = array(
               "ci" => $_POST["nuevoCi"],
               "nombre" => mb_strtoupper($_POST["nombreCliente"]),
               "apellido" => mb_strtoupper($_POST["apellidoCliente"]),
               "email" => $_POST["nuevoEmail"],
            );
            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
            if ($respuesta == "ok") {
               echo '<script>

					swal({

						type: "success",
						title: "¡El Cliente ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "clientes";

						}

					});

					</script>';
            }
         } else {

            echo '<script>

					swal({

						type: "error",
						title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "clientes";

						}

					});
				

				</script>';
         }
      }
   }



   /*=============================================
	EDITAR CLIENTE
	=============================================*/

   static public function ctrEditarCliente()
   {


      if (isset($_POST["editarCiCliente"])) {

         

         if (preg_match('/^[0-9]+$/', $_POST["editarCiCliente"])) {

            $tabla = "clientes";


            $datos = array(
               
               "nombre" => $_POST["editarNombreCliente"],
               "apellido" => $_POST["editarApellidoCliente"],
               "email" => $_POST["editarEmailCliente"],
               "ci" => $_POST["editarCiCliente"],
            );

            $respuesta = ModeloClientes::MdlEditarCliente($tabla, $datos);

            if ($respuesta == "ok") {

               echo '<script>

					swal({
                     type: "success",
                     title: "El cliente ha sido editado correctamente",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar"
                     }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';
            }
         } else {

            echo '<script>

					swal({
                  type: "error",
                  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

            </script>';
         }
      }
   }




   /*=============================================
	MOSTRAR CLIENTE
	=============================================*/

   static public function ctrMostrarCliente($item, $valor)
   {

      $tabla = "clientes";

      $respuesta = ModeloClientes::MdlMostrarCliente($tabla, $item, $valor);

      return $respuesta;
   }
   /*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

   static public function mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2)
   {

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

      $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
      $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

      if ($stmt->execute()) {

         return "ok";
      } else {

         return "error";
      }

      $stmt->close();

      $stmt = null;
   }

   /*=============================================
	BORRAR CLIENTE
	=============================================*/

   static public function ctrBorrarClientes()
   {

      if (isset($_GET["idCi"])) {

         $tabla = "clientes";
         $datos = $_GET["idCi"];

         $respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);

         if ($respuesta == "ok") {

            echo '<script>
				Swal.fire({
					title: "El Cliente ha sido borrado correctamente",
					icon: "success",
					showConfirmButton: true,

					confirmButtonColor: "#3085d6",

					confirmButtonText: "Cerrar"
					}).then((result) => {
                  window.location = "usuarios";
					})
            </script>';
         }
      }
   }
}
