// Mostrar formulario para agregar un nuevo empleado
function MNuevoEmpleado() {
  $("#modal-default").modal("show");

  $.ajax({
    type: "POST",
    url: "vista/empleado/FNuevoEmpleado.php",
    success: function (data) {
      $("#content-default").html(data);
    },
    error: function () {
      Swal.fire("Error", "No se pudo cargar el formulario", "error");
    },
  });
}

// Registrar un nuevo empleado
function regEmpleado() {
  var formData = new FormData($("#FRegEmpleado")[0]);
  $.ajax({
    type: "POST",
    url: "controlador/empleadoControlador.php?ctrRegEmpleado",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data === "ok") {
        Swal.fire("Empleado registrado", "El empleado ha sido agregado exitosamente", "success");
        setTimeout(() => location.reload(), 1200);
      } else {
        Swal.fire("Error", "No se pudo registrar el empleado", "error");
      }
    },
    error: function () {
      Swal.fire("Error", "Hubo un problema al procesar el registro", "error");
    },
  });
}

// Mostrar formulario para editar un empleado
function MEditEmpleado(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "POST",
    url: "vista/empleado/FEditEmpleado.php?id=" + id,
    success: function (data) {
      $("#content-default").html(data);
    },
    error: function () {
      Swal.fire("Error", "No se pudo cargar el formulario de edición", "error");
    },
  });
}

// Guardar cambios en la edición de un empleado
function editEmpleado() {
  var formData = new FormData($("#FEditEmpleado")[0]);
  $.ajax({
    type: "POST",
    url: "controlador/empleadoControlador.php?ctrEditEmpleado",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data === "ok") {
        Swal.fire("Empleado actualizado", "Los cambios han sido guardados", "success");
        setTimeout(() => location.reload(), 1200);
      } else {
        Swal.fire("Error", "No se pudo actualizar el empleado", "error");
      }
    },
    error: function () {
      Swal.fire("Error", "Hubo un problema al procesar los cambios", "error");
    },
  });
}

// Eliminar un empleado
function MEliEmpleado(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "No podrás revertir esto",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controlador/empleadoControlador.php?ctrEliEmpleado",
        data: { id: id },
        success: function (data) {
          if (data === "ok") {
            Swal.fire("Eliminado", "El empleado ha sido eliminado", "success");
            setTimeout(() => location.reload(), 1200);
          } else {
            Swal.fire("Error", "No se pudo eliminar el empleado", "error");
          }
        },
        error: function () {
          Swal.fire("Error", "Hubo un problema al eliminar el empleado", "error");
        },
      });
    }
  });
}
