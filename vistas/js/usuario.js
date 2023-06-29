/*============================================= 
SUBIENDO LA FOTO DEL USUARIO 
=============================================*/ 
// Cuando se selecciona una nueva foto en el formulario 
$(".nuevaFoto").change(function () { 
  // Obtenemos la imagen seleccionada 
  var imagen = this.files[0]; 
   /*============================================= 
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG 
      =============================================*/ 
  // Si el tipo de imagen no es JPEG o PNG, mostramos un error y vaciamos el campo de selección de archivo 
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") { 
    $(".nuevaFoto").val(""); 
     swal({ 
      title: "Error al subir la imagen", 
      text: "¡La imagen debe estar en formato JPG o PNG!", 
      type: "error", 
      confirmButtonText: "¡Cerrar!", 
    }); 
  // Si el tamaño de la imagen es mayor a 2 MB, mostramos un error y vaciamos el campo de selección de archivo 
  } else if (imagen["size"] > 2000000) { 
    $(".nuevaFoto").val(""); 
     swal({ 
      title: "Error al subir la imagen", 
      text: "¡La imagen no debe pesar más de 2MB!", 
      type: "error", 
      confirmButtonText: "¡Cerrar!", 
    }); 
  // Si la imagen es válida, creamos un objeto FileReader para leer la imagen y mostrarla en la vista previa 
  } else { 
    var datosImagen = new FileReader(); 
    datosImagen.readAsDataURL(imagen); 
     // Cuando se carga la imagen, mostramos la vista previa 
    $(datosImagen).on("load", function (event) { 
      var rutaImagen = event.target.result; 
       $(".previsualizar").attr("src", rutaImagen); 
    }); 
  } 
}); 
 /*============================================= 
EDITAR USUARIO 
=============================================*/ 
// Cuando se hace clic en el botón de editar usuario en la tabla 
$(".tablas").on("click", ".btnEditarUsuario", function () { 
  // Obtenemos el ID del usuario a editar 
  var idUsuario = $(this).attr("idUsuario"); 
   // Creamos un objeto FormData para enviar los datos al servidor 
  var datos = new FormData(); 
  datos.append("idUsuario", idUsuario); 
   // Realizamos una petición AJAX para obtener los datos del usuario 
  $.ajax({ 
    url: "ajax/usuarios.ajax.php", 
    method: "POST", 
    data: datos, 
    cache: false, 
    contentType: false, 
    processData: false, 
    dataType: "json", 
    success: function (respuesta) { 
      // Rellenamos los campos del formulario de edición con los datos obtenidos 
      $("#editarNombre").val(respuesta["nombre"]); 
      $("#editarApellido").val(respuesta["apellido"]); 
      $("#editarUsuario").val(respuesta["usuario"]); 
      $("#editarPerfil").html(respuesta["perfil"]); 
      $("#editarPerfil").val(respuesta["perfil"]); 
      $("#fotoActual").val(respuesta["foto"]); 
       $("#passwordActual").val(respuesta["password"]); 
       // Si el usuario tiene una foto, la mostramos en la vista previa 
      if (respuesta["foto"] != "") { 
        $(".previsualizar").attr("src", respuesta["foto"]); 
      } 
    }, 
  }); 
}); 
 /*============================================= 
ACTIVAR USUARIO 
=============================================*/ 
// Cuando se hace clic en el botón de activar/desactivar usuario en la tabla 
$(".tablas").on("click", ".btnActivar", function () { 
  // Obtenemos el ID del usuario y su estado actual 
  var idUsuario = $(this).attr("idUsuario"); 
  var estadoUsuario = $(this).attr("estadoUsuario"); 
   // Creamos un objeto FormData para enviar los datos al servidor 
  var datos = new FormData(); 
  datos.append("activarId", idUsuario); 
  datos.append("activarUsuario", estadoUsuario); 
   // Realizamos una petición AJAX para cambiar el estado del usuario 
  $.ajax({ 
    url: "ajax/usuarios.ajax.php", 
    method: "POST", 
    data: datos, 
    cache: false, 
    contentType: false, 
    processData: false, 
    success: function (respuesta) { 
      // Si la pantalla es de tamaño pequeño, mostramos una alerta de éxito 
      if (window.matchMedia("(max-width:767px)").matches) { 
        swal({ 
          title: "El usuario ha sido actualizado", 
          type: "success", 
          confirmButtonText: "¡Cerrar!", 
        }).then(function (result) { 
          if (result.value) { 
            window.location = "usuarios"; 
          } 
        }); 
      } 
    }, 
  }); 
   // Cambiamos el botón y el estado del usuario según su estado actual 
  if (estadoUsuario == 0) { 
    $(this).removeClass("btn-success"); 
    $(this).addClass("btn-danger"); 
    $(this).html("Desactivado"); 
    $(this).attr("estadoUsuario", 1); 
  } else { 
    $(this).addClass("btn-success"); 
    $(this).removeClass("btn-danger"); 
    $(this).html("Activado"); 
    $(this).attr("estadoUsuario", 0); 
  } 
}); 
 /*============================================= 
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO 
=============================================*/ 
// Cuando se cambia el valor del campo de nombre de usuario en el formulario de registro 
$("#nuevoUsuario").change(function () { 
  // Eliminamos cualquier alerta existente 
  $(".alert").remove(); 
   // Obtenemos el nombre de usuario ingresado 
  var usuario = $(this).val(); 
   // Creamos un objeto FormData para enviar los datos al servidor 
  var datos = new FormData(); 
  datos.append("validarUsuario", usuario); 
   // Realizamos una petición AJAX para validar si el nombre de usuario ya existe 
  $.ajax({ 
    url: "ajax/usuarios.ajax.php", 
    method: "POST", 
    data: datos, 
    cache: false, 
    contentType: false, 
    processData: false, 
    dataType: "json", 
    success: function (respuesta) { 
      // Si el nombre de usuario ya existe, mostramos una alerta y vaciamos el campo 
      if (respuesta) { 
        $("#nuevoUsuario") 
          .parent() 
          .after( 
            '<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>' 
          ); 
         $("#nuevoUsuario").val(""); 
      } 
    }, 
  }); 
}); 
 /*============================================= 
ELIMINAR USUARIO 
=============================================*/ 
// Cuando se hace clic en el botón de eliminar usuario en la tabla 
$(".tablas").on("click", ".btnEliminarUsuario", function () { 
  // Obtenemos el ID del usuario, su foto y su nombre de usuario 
  var idUsuario = $(this).attr("idUsuario"); 
  var fotoUsuario = $(this).attr("fotoUsuario"); 
  var usuario = $(this).attr("usuario"); 
   // Mostramos una ventana de confirmación para eliminar el usuario 
  swal({ 
    title: "¿Está seguro de borrar el usuario?", 
    text: "¡Si no lo está puede cancelar la accíón!", 
    type: "warning", 
    showCancelButton: true, 
    confirmButtonColor: "#3085d6", 
    cancelButtonColor: "#d33", 
    cancelButtonText: "Cancelar", 
    confirmButtonText: "Si, borrar usuario!" 
  }).then(function (result) { 
    // Si se confirma la acción, redirigimos a la página de usuarios con los datos necesarios para eliminar el usuario 
    if (result.value) { 
      window.location = 
        "index.php?ruta=usuarios&idUsuario=" + 
        idUsuario + 
        "&usuario=" + 
        usuario + 
        "&fotoUsuario=" + 
        fotoUsuario; 
    } 
  }); 
});