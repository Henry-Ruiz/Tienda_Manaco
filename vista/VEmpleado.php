<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0 text-dark">Empleados Registrados</h1>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de empleados registrados</h3>
          <button class="btn btn-primary float-right" onclick="MNuevoEmpleado()">
            <i class="fas fa-plus"></i> Añadir Empleado
          </button>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $empleados = ControladorEmpleado::ctrInfoEmpleados();
              foreach ($empleados as $empleado) {
                echo "<tr>
                        <td>{$empleado['id_empleado']}</td>
                        <td>{$empleado['nombre_completo']}</td>
                        <td>{$empleado['cargo']}</td>
                        <td>{$empleado['telefono']}</td>
                        <td>{$empleado['email']}</td>
                        <td>
                          <button class='btn btn-secondary' onclick='MEditEmpleado({$empleado['id_empleado']})'>
                            <i class='fas fa-edit'></i> Editar
                          </button>
                          <button class='btn btn-danger' onclick='MEliEmpleado({$empleado['id_empleado']})'>
                            <i class='fas fa-trash'></i> Eliminar
                          </button>
                        </td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
