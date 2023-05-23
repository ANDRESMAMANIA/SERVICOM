<?php

/** 
 * 
 */
class ControladorMateriales

{

   /*=============================================
	REGISTRO DE USUARIOS
	=============================================*/
   static public function ctrCrearMaterial()
   {
      if (isset($_POST["nuevoDescripciondMaterial"])) {
         if (
            preg_match('/^[0-9]+$/', $_POST["nuevaCantidadMaterial"]) &&
            preg_match('/^[0-9]+$/', $_POST["nuevoPrecioMaterial"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripciondMaterial"])


         ) {

            $tabla = "materiales";
            $datos = array(
               "descripcion" => $_POST["nuevoDescripciondMaterial"],
               "cantidad" => $_POST["nuevaCantidadMaterial"],
               "precio" => $_POST["nuevoPrecioMaterial"],
            );
            $respuesta = ModeloMateriales::mdlIngresarMaterial($tabla, $datos);
            if ($respuesta == "ok") {
               echo '<script>

					swal({

						type: "success",
						title: "¡El material ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "materiales";

						}

					});

					</script>';
            }
         } else {

            echo '<script>

					swal({

						type: "error",
						title: "¡El material no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "materiales";

						}

					});
				

				</script>';
         }
      }
   }



   /*=============================================
	EDITAR USUARIO
	=============================================*/

   static public function ctrEditarMaterial()
   {


      if (isset($_POST["editarDescripciondMaterial"])) {

         

         if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripciondMaterial"]) ){

            $tabla = "materiales";


            $datos = array(
               "descripcion" => $_POST["editarDescripciondMaterial"],
               "cantidad" => $_POST["editarCantidadMaterial"],
               "precio" => $_POST["editarPrecioMaterial"],
            );

            $respuesta = ModeloMateriales::mdlEditarMaterial($tabla, $datos);

            if ($respuesta == "ok") {

               echo '<script>

					swal({
                     type: "success",
                     title: "El material ha sido editado correctamente",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar"
                     }).then(function(result){
									if (result.value) {

									window.location = "materiales";

									}
								})

					</script>';
            }
         } else {

            echo '<script>

					swal({
                  type: "error",
                  title: "¡Los mateteriales no puede ir vacío o llevar caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
							if (result.value) {

							window.location = "materiales";

							}
						})

            </script>';
         }
      }
   }




   /*=============================================
	MOSTRAR CLIENTE
	=============================================*/

   static public function ctrMostrarMaterial($item, $valor)
   {

      $tabla = "materiales";

      $respuesta = ModeloMateriales::MdlMostrarMaterial($tabla, $item, $valor);

      return $respuesta;
   }
   /*=============================================
	ACTUALIZAR USUARIO
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
	BORRAR USUARIO
	=============================================*/

   static public function ctrBorrarMaterial()
   {

      if (isset($_GET["idDescripcion"])) {

         $tabla = "materiales";
         $datos = $_GET["idDescripcion"];

         $respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);

         if ($respuesta == "ok") {

            echo '<script>
				Swal.fire({
					title: "El material ha sido borrado correctamente",
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
