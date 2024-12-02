<form class="form-horizontal" action="" id="FRegEmpleado">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Empleado</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="nombre_completo" class="col-sm-3 col-form-label">Nombre Completo :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="cargo" class="col-sm-3 col-form-label">Cargo :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Teléfono :</label>
      <div class="col-sm-9">
        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required pattern="[0-9]{7,15}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email :</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancelar</button>
  </div>
  <!-- /.card-footer -->
</form>

<script>
  // Envia los datos del formulario al controlador
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        regEmpleado();
      }
    });
    $('#FRegEmpleado').validate({
      rules: {
        nombre_completo: {
          required: true,
          minlength: 3,
        },
        cargo: {
          required: true,
          minlength: 3
        },
        telefono: {
          required: true,
          minlength: 7,
          digits: true
        },
        email: {
          required: true,
          email: true
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });

  function regEmpleado() {
    var formData = new FormData($("#FRegEmpleado")[0]);
    $.ajax({
      type: "POST",
      url: "controlador/empleadoControlador.php?ctrRegEmpleado",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        if (data === "ok") {
          Swal.fire("Empleado registrado", "", "success");
          setTimeout(() => location.reload(), 1200);
        } else {
          Swal.fire("Error", "No se pudo registrar el empleado", "error");
        }
      },
      error: function() {
        Swal.fire("Error", "Hubo un problema al procesar el registro", "error");
      }
    });
  }
</script>
