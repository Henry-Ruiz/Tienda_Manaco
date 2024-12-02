<?php
$cliente = ControladorCliente::ctrCantidadClientes();  // Cantidad de clientes
$usuario = ControladorUsuario::ctrCantidadUsuarios();  // Cantidad de usuarios
$empleado = ControladorEmpleado::ctrCantidadEmpleados();  // Cantidad de empleados
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-light">Panel de Administración</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Clientes -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $cliente; ?></h3> <!-- Cantidad de clientes -->
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="VCliente" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Usuarios -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $usuario; ?></h3> <!-- Cantidad de usuarios -->
              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="VUsuario" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Empleados -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $empleado; ?></h3> <!-- Cantidad de empleados -->
              <p>Empleados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stress"></i>
            </div>
            <a href="VEmpleado" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div><!-- /.row -->

      <!-- Date and time range (si es necesario) -->
      <div class="form-group">
        <label>Seleccione un rango de fecha:</label>
        <div class="input-group">
          <button type="button" class="btn btn-default float-right" id="daterange-btn">
            <i class="far fa-calendar-alt"></i> Date range picker
            <i class="fas fa-caret-down"></i>
          </button>
        </div>
      </div>

      <!-- Card for Sales Graph (si es necesario) -->
      <div class="card bg-gradient-dark">
        <div class="card-header border-0">
          <h3 class="card-title text-light">
            <i class="fas fa-th mr-1"></i>
            Sales Graph
          </h3>
          <div class="card-tools">
            <button type="button" class="btn bg-dark btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn bg-dark btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div><!-- /.card-body -->

        <div class="card-footer bg-transparent">
          <div class="row">
            <div class="col-4 text-center">
              <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
              <div class="text-white">Mail-Orders</div>
            </div>
            <div class="col-4 text-center">
              <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
              <div class="text-white">Online</div>
            </div>
            <div class="col-4 text-center">
              <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
              <div class="text-white">In-Store</div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.card-footer -->
      </div><!-- /.card -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div><!-- /.content-wrapper -->
