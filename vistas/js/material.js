/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarMaterial", function () {
  var idDescripcion = $(this).attr("idDescripcion");

  var datos = new FormData();
  datos.append("idDescripcion", idDescripcion);

  $.ajax({
    url: "ajax/materiales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarDescripciondMaterial").val(respuesta["descripcion"]);
      $("#editarCantidadMaterial").val(respuesta["cantidad"]);
      $("#editarPrecioMaterial").val(respuesta["precio"]);


    },
  });
});



/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarMaterial", function () {
  var idDescripcion = $(this).attr("idDescripcion");


  swal({
    title: "¿Está seguro de borrar el el material?",
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
        "index.php?ruta=materiales&idDescripcion=" +
        idDescripcion;
    }
  });
});