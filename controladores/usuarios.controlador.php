<?php

/** 
 * 
 */
class ControladorUsuarios
{
   /*=============================================
	INGRESO USUARIO
	=============================================*/
   public function ctrIngresoUsuario()
   {
      // Verificar si se ha enviado el formulario de ingreso de usuario
      if (isset($_POST['ingUsuario'])) {
         // Validar el formato del usuario y la contraseña
         if (
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
         ) {
            // Encriptar la contraseña ingresada para compararla con la almacenada
            $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            // Obtener información del usuario desde la base de datos
            $tabla = "usuarios";
            $item = "usuario";
            $valor = $_POST['ingUsuario'];
            $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

            // Verificar si el usuario y la contraseña coinciden
            if ($respuesta['usuario'] == $_POST['ingUsuario'] && $respuesta['password'] == $encriptar) {
               // Iniciar sesión
               $_SESSION['IniciarSesion'] = 'ok';

               // Redireccionar al inicio
               echo '<script> window.location = "inicio"    </script>';
            } else {
               // Mostrar mensaje de error al ingresar
               echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
            }
         }
      }
   }

   /*=============================================
	REGISTRO DE USUARIOS
	=============================================*/
   static public function ctrCrearUsuario()
   {
      // Verificar si se ha enviado el formulario de creación de usuario
      if (isset($_POST["nuevoUsuario"])) {
         // Validar los formatos de los campos del formulario
         if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', mb_strtoupper($_POST["nuevoNombre"])) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
         ) {
            // Variables para la manipulación de la imagen
            $ruta = "";

            // Verificar si se ha seleccionado una imagen
            if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
               // Obtener dimensiones de la imagen
               list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

               $nuevoAncho = 500;
               $nuevoAlto = 500;

               /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

               $directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];

               // Crear directorio para el usuario
               mkdir($directorio, 0755);

               /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

               if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                  /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                  $aleatorio = mt_rand(100, 999);

                  $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

                  // Crear una imagen desde el archivo temporal
                  $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                  // Crear una imagen vacía con las dimensiones deseadas
                  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                  // Redimensionar la imagen
                  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                  // Guardar la imagen redimensionada en el directorio
                  imagejpeg($destino, $ruta);
               }
               if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                  /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                  $aleatorio = mt_rand(100, 999);

                  $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

                  // Crear una imagen desde el archivo temporal
                  $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                  // Crear una imagen vacía con las dimensiones deseadas
                  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                  // Redimensionar la imagen
                  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                  // Guardar la imagen redimensionada en el directorio
                  imagepng($destino, $ruta);
               }
            }

            // Datos del nuevo usuario
            $tabla = "usuarios";
            $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $datos = array(
               "nombre" => $_POST["nuevoNombre"],
               "apellido" => $_POST["nuevoApellido"],
               "usuario" => $_POST["nuevoUsuario"],
               "password" => $encriptar,
               "perfil" => $_POST["nuevoPerfil"],
               "foto" => $ruta
            );

            // Ingresar el nuevo usuario en la base de datos
            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
               // Mostrar mensaje de éxito al crear usuario
               echo '<script>
					swal({
						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
            }
         } else {
            // Mostrar mensaje de error al crear usuario con formato incorrecto
            echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
				</script>';
         }
      }
   }


   /*============================================= 
	EDITAR USUARIO 
	=============================================*/
   // Método estático para editar un usuario 
   static public function ctrEditarUsuario()
   {
      // Verifica si se ha enviado el formulario de edición de usuario 
      if (isset($_POST["editarUsuario"])) {
         // Valida que el nombre del usuario no esté vacío y no contenga caracteres especiales 
         if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
            /*============================================= 
             VALIDAR IMAGEN 
             =============================================*/
            // Asigna la ruta de la imagen actual del usuario 
            $ruta = $_POST["fotoActual"];
            // Verifica si se ha subido una nueva imagen en el formulario 
            if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
               // Obtiene las dimensiones de la nueva imagen 
               list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
               // Establece las dimensiones deseadas para la nueva imagen 
               $nuevoAncho = 500;
               $nuevoAlto = 500;
               /*============================================= 
                CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO 
                =============================================*/
               // Crea el directorio donde se guardará la imagen del usuario 
               $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];
               /*============================================= 
                PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD 
                =============================================*/
               // Si ya existe una imagen en la base de datos, la elimina 
               if (!empty($_POST["fotoActual"])) {
                  unlink($_POST["fotoActual"]);
               } else {
                  // Si no existe una imagen previa, crea el directorio para guardarla 
                  mkdir($directorio, 0755);
               }
               /*============================================= 
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP 
                =============================================*/
               // Si la imagen es de tipo JPEG 
               if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                  /*============================================= 
                   GUARDAMOS LA IMAGEN EN EL DIRECTORIO 
                   =============================================*/
                  // Genera un número aleatorio para el nombre de la imagen 
                  $aleatorio = mt_rand(100, 999);
                  // Define la ruta donde se guardará la imagen 
                  $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";
                  // Crea la imagen a partir del archivo subido 
                  $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                  // Crea una imagen con las dimensiones deseadas 
                  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                  // Copia la imagen original en la nueva imagen con las dimensiones deseadas 
                  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                  // Guarda la imagen en la ruta especificada 
                  imagejpeg($destino, $ruta);
               }
               // Si la imagen es de tipo PNG 
               if ($_FILES["editarFoto"]["type"] == "image/png") {
                  /*============================================= 
                   GUARDAMOS LA IMAGEN EN EL DIRECTORIO 
                   =============================================*/
                  // Genera un número aleatorio para el nombre de la imagen 
                  $aleatorio = mt_rand(100, 999);
                  // Define la ruta donde se guardará la imagen 
                  $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";
                  // Crea la imagen a partir del archivo subido 
                  $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                  // Crea una imagen con las dimensiones deseadas 
                  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                  // Copia la imagen original en la nueva imagen con las dimensiones deseadas 
                  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                  // Guarda la imagen en la ruta especificada 
                  imagepng($destino, $ruta);
               }
            }
            // Define la tabla de usuarios 
            $tabla = "usuarios";
            // Si se ha ingresado una nueva contraseña en el formulario 
            if ($_POST["editarPassword"] != "") {
               // Valida que la contraseña no contenga caracteres especiales 
               if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                  // Encripta la nueva contraseña 
                  $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
               } else {
                  // Si la contraseña contiene caracteres especiales, muestra un mensaje de error y detiene la ejecución 
                  echo '<script> 
                       swal({ 
                         type: "error", 
                         title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!", 
                         showConfirmButton: true, 
                         confirmButtonText: "Cerrar" 
                         }).then(function(result){ 
                         if (result.value) { 
                             window.location = "usuarios"; 
                          } 
                      }) 
                    </script>';
                  return;
               }
            } else {
               // Si no se ha ingresado una nueva contraseña, mantiene la contraseña actual 
               $encriptar = $_POST["passwordActual"];
            }
            // Crea un array con los datos del usuario a editar 
            $datos = array(
               "nombre" => $_POST["editarNombre"],
               "apellido" => $_POST["editarApellido"],
               "usuario" => $_POST["editarUsuario"],
               "password" => $encriptar,
               "perfil" => $_POST["editarPerfil"],
               "foto" => $ruta
            );
            // Llama al método para editar el usuario en la base de datos 
            $respuesta = ModeloUsuarios::MdlEditarUsuario($tabla, $datos);
            // Si la edición fue exitosa, muestra un mensaje de éxito 
            if ($respuesta == "ok") {
               echo '<script> 
                 swal({ 
                      type: "success", 
                      title: "El usuario ha sido editado correctamente", 
                      showConfirmButton: true, 
                      confirmButtonText: "Cerrar" 
                      }).then(function(result){ 
                            if (result.value) { 
                             window.location = "usuarios"; 
                             } 
                         }) 
                 </script>';
            }
         } else {
            // Si el nombre del usuario contiene caracteres especiales, muestra un mensaje de error 
            echo '<script> 
                 swal({ 
                   type: "error", 
                   title: "¡El nombre no puede ir vacío o llevar caracteres especiales!", 
                   showConfirmButton: true, 
                   confirmButtonText: "Cerrar" 
                   }).then(function(result){ 
                      if (result.value) { 
                       window.location = "usuarios"; 
                       } 
                   }) 
              </script>';
         }
      }
   }

   /*=============================================
	MOSTRAR USUARIO
	=============================================*/

   // Esta función estática se encarga de mostrar un usuario específico según el item y el valor proporcionados
   static public function ctrMostrarUsuarios($item, $valor)
   {
      $tabla = "usuarios";

      // Llama al método "MdlMostrarUsuarios" del modelo "ModeloUsuarios" para obtener la información del usuario
      $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

      return $respuesta;
   }

   /*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

   // Esta función estática se encarga de actualizar un usuario en la base de datos
   static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
   {
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

      // Asigna los valores a los parámetros de la consulta preparada
      $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
      $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

      if ($stmt->execute()) {
         // Si la consulta se ejecuta correctamente, devuelve "ok"
         return "ok";
      } else {
         // Si hay un error en la ejecución de la consulta, devuelve "error"
         return "error";
      }

      $stmt->close();

      $stmt = null;
   }


   /*=============================================
	BORRAR USUARIO
	=============================================*/

   // Esta función estática se encarga de borrar un usuario de la base de datos
   static public function ctrBorrarUsuario()
   {
      if (isset($_GET["idUsuario"])) {

         $tabla = "usuarios";
         $datos = $_GET["idUsuario"];

         if ($_GET["fotoUsuario"] != "") {
            // Elimina la foto del usuario y el directorio asociado
            unlink($_GET["fotoUsuario"]);
            rmdir('vistas/img/usuarios/' . $_GET["usuario"]);
         }

         // Llama al método "mdlBorrarUsuario" del modelo "ModeloUsuarios" para borrar el usuario de la base de datos
         $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

         if ($respuesta == "ok") {
            // Si el usuario se borra correctamente, muestra una alerta de éxito y redirige a la página de usuarios
            echo '<script>
				Swal.fire({
					title: "El usuario ha sido borrado correctamente",
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
