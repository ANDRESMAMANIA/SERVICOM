/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function () {
  var idCi = $(this).attr("idCi");

  var datos = new FormData();
  datos.append("idCi", idCi);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarCiCliente").val(respuesta["ci"]);
      $("#editarNombreCliente").val(respuesta["nombre"]);
      $("#editarApellidoCliente").val(respuesta["apellido"]);
      $("#editarEmailCliente").val(respuesta["email"]);


    },
  });
});

/*=============================================
ACTIVAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnActivar", function () {
  var idCi = $(this).attr("idCi");
  var estadoCliente = $(this).attr("estadoCliente");

  var datos = new FormData();
  datos.append("activarId", idCi);
  datos.append("activarCi", estadoCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        swal({
          title: "El Cliente ha sido actualizado",
          type: "success",
          confirmButtonText: "¡Cerrar!",
        }).then(function (result) {
          if (result.value) {
            window.location = "clientes";
          }
        });
      }
    },
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoCliente", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoCliente", 0);
  }
});

/*=============================================
REVISAR SI EL CLIENTE YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCi").change(function () {
  $(".alert").remove();

  var ci = $(this).val();

  var datos = new FormData();
  datos.append("validarCi", ci);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#nuevoCi")
          .parent()
          .after(
            '<div class="alert alert-warning">Este cliente ya existe en la base de datos</div>'
          );

        $("#nuevoCi").val("");
      }
    },
  });
});

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function () {
  var idCi = $(this).attr("idCi");


  swal({
    title: "¿Está seguro de borrar el cliente?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!"
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=clientes&idCi=" +
        idCi;
    }
  });
});