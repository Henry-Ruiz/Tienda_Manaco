<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0 text-dark">Clientes Registrados</h1>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de clientes registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIT/CI</th>
                <th>Dirección</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>
                
                   
                    <button class="btn btn-primary float-right" onclick="MNuevoCliente()">
                      <i class="fas fa-plus"></i> Añadir Cliente
                    </button>
                 
                </th>
              </tr>
            </thead>

            <tbody>
              <?php
              $cliente = ControladorCliente::ctrInfoClientes();
              foreach ($cliente as $value) {
              ?>
                <tr>
                  <td> <?php echo $value["id_cliente"]; ?> </td>
                  <td> <?php echo $value["nit_ci"]; ?> </td>
                  <td> <?php echo $value["direccion"]; ?> </td>
                  <td> <?php echo $value["nombre_contacto"]; ?> </td>
                  <td> <?php echo $value["telefono"]; ?> </td>
                  <td> <?php echo $value["email"]; ?> </td>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-secondary" onclick="MEditCliente(<?php echo $value['id_cliente']; ?>)">
                        <i class="fas fa-edit"></i> Editar
                      </button>
                      <button class="btn btn-danger" onclick="MEliCliente(<?php echo $value['id_cliente']; ?>)">
                        <i class="fas fa-trash"></i> Eliminar
                      </button>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- Scripts personalizados -->
<script src="assest/js/cliente.js"></script>

