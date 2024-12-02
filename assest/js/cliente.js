
function MNuevoCliente() {
  $("#modal-default").modal("show");

  var obj = "";
  $.ajax({
      type: "POST",
      url: "vista/cliente/FNuevoCliente.php",
      data: obj,
      success: function(data) {
          $("#content-default").html(data);
 }
});
}
var data="";
function regCliente() {
  var formData = new FormData($("#FRegCliente")[0]);

  $.ajax({
      type: "POST",
      url: "controlador/clienteControlador.php?ctrRegCliente",  // Cambia esta URL por la correcta
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
          if(response === "ok") {
              Swal.fire({
                  icon: "success",
                  title: "Cliente registrado",
                  showConfirmButton: false,
                  timer: 1000
              });
              setTimeout(function() {
                  location.reload();  // Recarga la página
              }, 1200);
          } else {
              Swal.fire({
                  title: "Error",
                  icon: "error",
                  text: "No se pudo registrar el cliente",
                  showConfirmButton: true
              });
          }
      },
      error: function(xhr, status, error) {
          console.log("Error: " + error);  // Esto te ayudará a depurar el error
      }
  });
}


function MEditCliente(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "POST",
    url: "vista/cliente/FEditCliente.php?id=" + id,
    success: function (data) {
      $("#content-default").html(data); // Carga el contenido del modal
    },
    error: function () {
      console.error("No se pudo cargar el contenido del modal.");
    },
  });
}


function editCliente() {
  var formData = new FormData($("#FEditCliente")[0]);
  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrEditCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      console.log("editCliente - success:", data);
      if (data === "ok") {
        Swal.fire({
          icon: "success",
          showConfirmButton: false,
          title: "El cliente ha sido actualizado",
          timer: 1000,
        });

        // Recargar solo los datos de la tabla sin recargar la página
        $("#example1").DataTable().ajax.reload(null, false); // Recarga los datos de la tabla sin reiniciar la paginación
      } else {
        Swal.fire({
          title: "Error",
          icon: "error",
          showConfirmButton: false,
          timer: 1000,
        });
      }
    },
    error: function (xhr, status, error) {
      console.error("editCliente - error:", status, error);
    }
  });
}

function MEliCliente(id) {
  Swal.fire({
    title: "¿Estás seguro de eliminar este cliente?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: "Confirmar",
    denyButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controlador/clienteControlador.php?ctrEliCliente",
        data: { id: id },
        success: function (data) {
          console.log("MEliCliente - success:", data);
          if (data === "ok") {
            Swal.fire({
              icon: "success",
              showConfirmButton: false,
              title: "Cliente eliminado",
              timer: 1000,
            });

            // Recargar solo los datos de la tabla sin recargar la página
            $("#example1").DataTable().ajax.reload(null, false); // Recarga los datos de la tabla sin reiniciar la paginación
          } else {
            Swal.fire({
              icon: "error",
              showConfirmButton: false,
              title: "Error",
              text: "El cliente no pudo ser eliminado",
              timer: 1000,
            });
          }
        },
        error: function (xhr, status, error) {
          console.error("MEliCliente - error:", status, error);
        }
      });
    }
  });
}

