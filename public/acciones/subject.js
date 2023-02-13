$("body").on("click", "#items a", function () {
  var id = $(this).data("id");
  var tipo = $(this).attr("id");
  // editar
  if (tipo == 4) {
    eliminar(id);
  }
});

function eliminar(id) {
  Swal.fire({
    title: "Quiere eliminar este registro?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
    confirmButtonClass: "btn btn-warning",
    cancelButtonText: "Cancelar",
    cancelButtonClass: "btn btn-danger ml-1",
    buttonsStyling: false,
    allowOutsideClick: function () {
      !Swal.isLoading();
    },
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        type: "GET",
        url: "/subject/delete/" + id,
        data: $(this).serialize(),
        success: function (data) {
          if (data.type == "success") {
            autClose(data.title);
            setTimeout(function () {
              location.reload();
            }, 1500);
          } else if (data.type == "error") {
            msg_type(data.type, data.title, "");
          }
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      msg_type("success", "Tu registro imaginario ha sido salvado", "");
    }
  });
}
