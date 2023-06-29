<?php

require_once "conexion.php";
class ModeloClientes
{

   

   /*=============================================
   MOSTRAR USUARIOS
   =============================================*/

   static public function mdlMostrarCliente($tabla, $item, $valor)
   {
      if ($item != null) {

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ($item = :$item)");

         $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

         $stmt->execute();

         return $stmt->fetch();
      } else {

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

         $stmt->execute();


         return $stmt->fetchAll();
      }
      $stmt->close();
      $stmt = null;
   }
   /*=============================================
	REGISTRO DE CLIENTE
	=============================================*/
   static public function mdlIngresarCliente($tabla, $datos)
   {
      $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(ci, nombre,apellido, email) VALUES (:ci, :nombre, :apellido, :email)");
      $stmt->bindParam(":ci",  $datos["ci"], PDO::PARAM_STR);
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);


      if ($stmt->execute()) {
         return "ok";
      } else {
         return "error";
      }

      $stmt->close();
      $stmt = null;
   }
		/*=============================================
	EDITAR DE USUARIO
	=============================================*/
	static public function mdlEditarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, email = :email WHERE ci = :ci");

      
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
      $stmt->bindParam(":ci",  $datos["ci"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
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

   static public function mdlBorrarCliente($tabla, $datos)
   {

      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

      $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

      if ($stmt->execute()) {

         return "ok";
      } else {

         return "error";
      }

      $stmt->close();

      $stmt = null;
   }
}
