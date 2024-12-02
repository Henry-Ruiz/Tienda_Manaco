<?php
require_once "../../controlador/empleadoControlador.php";
require_once "../../modelo/empleadoModelo.php";

$id = $_GET["id"];
$empleado = ControladorEmpleado::ctrInfoEmpleado($id);
?>

<form class="form-horizontal" action="" id="FEditEmpleado">
  <div class="modal-header">
    <h4 class="modal-title">Actualizar Empleado</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="id" class="col-sm-3 col-form-label">ID Empleado:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" id="id" value="<?php echo $empleado["id_empleado"]; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre_completo" class="col-sm-3 col-form-label">Nombre Completo :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?php echo $empleado["nombre_completo"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="cargo" class="col-sm-3 col-form-label">Cargo :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $empleado["cargo"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Telefono :</label>
      <div class="col-sm-9">
        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $empleado["telefono"]; ?>" pattern="[0-9]{7,15}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email :</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $empleado["email"]; ?>">
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
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editEmpleado();
      }
    });

    $('#FEditEmpleado').validate({
      rules: {
        nombre_completo: {
          required: true,
          minlength: 3,
        },
        cargo: {
          required: true,
          minlength: 3,
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