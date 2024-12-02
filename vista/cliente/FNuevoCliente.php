<form Action="" id="FRegCliente">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 
    <div class="form-group row">
      <label for="nit_ci" class="col-sm-3 col-form-label">NIT/CI:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nit_ci" name="nit" placeholder="NIT / CI" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
      <div class="col-sm-9">
        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancelar</button>
  </div>
</form>

<script>
$(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        regCliente();
      }
    });
    $('#FRegCliente').validate({
      rules: {
        nit: {
          required: true,
          minlength: 3
        },
        direccion: {
          required: true,
          minlength: 3
        },
        nombre: {
          required: true,
          minlength: 3
        },
        telefono: {
          required: true,
          minlength: 6,
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
</script>
