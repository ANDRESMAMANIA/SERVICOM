<?php

require_once "conexion.php";

class ModeloRegistroEquipos{

	/*=============================================
	MOSTRAR RegistroEquipos{
	=============================================*/

	static public function mdlMostrarRegistroEquipo($tabla, $item, $valor){

		// Verifica si se especifica un criterio de búsqueda
		if($item != null){

			// Prepara la consulta SQL para seleccionar registros de la tabla en base al criterio especificado
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			// Vincula el valor del criterio a los parámetros de la consulta
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			// Ejecuta la consulta
			$stmt -> execute();

			// Devuelve un solo registro encontrado
			return $stmt -> fetch();

		}else{
			// Si no se especifica un criterio de búsqueda, se obtienen todos los registros de la tabla ordenados por el id

			// Prepara la consulta SQL para seleccionar todos los registros de la tabla
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			// Ejecuta la consulta
			$stmt -> execute();

			// Devuelve todos los registros encontrados
			return $stmt -> fetchAll();

		}
		
		// Cierra el statement
		$stmt -> close();

		// Establece el statement a null para liberar los recursos
		$stmt = null;

	}

	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos){

		// Prepara la consulta SQL para insertar un nuevo registro de venta en la tabla
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

		// Vincula los valores de los parámetros a los valores de los datos del registro de venta
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		// Ejecuta la consulta
		if($stmt->execute()){

			// Si la consulta se ejecuta correctamente, devuelve "ok"
			return "ok";

		}else{

			// Si la consulta no se ejecuta correctamente, devuelve "error"
			return "error";
		
		}

		// Cierra el statement
		$stmt->close();

		// Establece el statement a null para liberar los recursos
		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){

		// Prepara la consulta SQL para actualizar un registro de venta existente en la tabla
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

		// Vincula los valores de los parámetros a los valores de los datos actualizados del registro de venta
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		// Ejecuta la consulta
		if($stmt->execute()){

			// Si la consulta se ejecuta correctamente, devuelve "ok"
			return "ok";

		}else{

			// Si la consulta no se ejecuta correctamente, devuelve "error"
			return "error";
		
		}

		// Cierra el statement
		$stmt->close();

		// Establece el statement a null para liberar los recursos
		$stmt = null;

	}

	/*=============================================
	ELIMINAR RegistroEquipos
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos){

		// Prepara la consulta SQL para eliminar un registro de venta de la tabla en base al id
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		// Vincula el valor del id al parámetro de la consulta
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		// Ejecuta la consulta
		if($stmt -> execute()){

			// Si la consulta se ejecuta correctamente, devuelve "ok"
			return "ok";
		
		}else{

			// Si la consulta no se ejecuta correctamente, devuelve "error"
			return "error";	

		}

		// Cierra el statement
		$stmt -> close();

		// Establece el statement a null para liberar los recursos
		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		// Verifica si la fecha inicial no se especifica
		if($fechaInicial == null){

			// Prepara la consulta SQL para seleccionar todos los registros de la tabla ordenados por el id
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			// Ejecuta la consulta
			$stmt -> execute();

			// Devuelve todos los registros encontrados
			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			// Prepara la consulta SQL para seleccionar registros de la tabla en base a una fecha específica
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			// Vincula el valor de la fecha al parámetro de la consulta
			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			// Ejecuta la consulta
			$stmt -> execute();

			// Devuelve los registros encontrados
			return $stmt -> fetchAll();

		}else{

			// Obtiene la fecha actual y le suma un día
			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			// Obtiene la fecha final y le suma un día
			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			// Verifica si la fecha final más uno es igual a la fecha actual más uno
			if($fechaFinalMasUno == $fechaActualMasUno){

				// Prepara la consulta SQL para seleccionar registros de la tabla en un rango de fechas específico, incluyendo la fecha actual más uno
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{

				// Prepara la consulta SQL para seleccionar registros de la tabla en un rango de fechas específico
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			// Ejecuta la consulta
			$stmt -> execute();

			// Devuelve los registros encontrados
			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	SUMAR EL TOTAL DE RegistroEquipos
	=============================================*/

	static public function mdlSumaTotalVentas($tabla){	

		// Prepara la consulta SQL para obtener la suma total de la columna "neto" en la tabla
		$stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");

		// Ejecuta la consulta
		$stmt -> execute();

		// Devuelve el resultado de la consulta
		return $stmt -> fetch();

		// Cierra el statement
		$stmt -> close();

		// Establece el statement a null para liberar los recursos
		$stmt = null;

	}

	
}
