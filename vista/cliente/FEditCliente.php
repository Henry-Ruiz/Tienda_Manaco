<?php

require_once "../../controlador/clienteControlador.php";
require_once "../../modelo/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorCliente::ctrInfoCliente($id);

?>



<form class="form-horizontal" action="" id="FEditCliente">
  <div class="modal-header">
    <h4 class="modal-title">Actualizar Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="nit_ci" class="col-sm-3 col-form-label">NIT/CI :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nit_ci" name="nit_ci" 
               value="<?php echo $cliente["nit_ci"] ?? ''; ?>" placeholder="NIT/CI">
      </div>
    </div>
    <div class="form-group row">
      <label for="direccion" class="col-sm-3 col-form-label">Dirección :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="direccion" name="direccion" 
               value="<?php echo $cliente["direccion"] ?? ''; ?>" placeholder="Dirección">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" 
               value="<?php echo $cliente["nombre_contacto"] ?? ''; ?>" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Teléfono :</label>
      <div class="col-sm-9">
        <input type="tel" class="form-control" id="telefono" name="telefono" 
               value="<?php echo $cliente["telefono"] ?? ''; ?>" placeholder="Teléfono" style="appearance: none;">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email :</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" 
               value="<?php echo $cliente["email"] ?? ''; ?>" placeholder="Email">
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
        editCliente()
      }
    });
    $('#FEditCliente').validate({
      rules: {

          nit_ci: {
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
          //que sea solo numeros, no  caracteres
          digits: true

        },
        email: {
          required: true,
          minlength: 3
        },
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