<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda de calzados Manaco</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assest/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assest/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assest/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assest/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assest/dist/css/adminlte.min.css">
  <link rel="icon" href="assest/dist/img/mana.jpg">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assest/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body>
<?php
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
  // Verificar si hay una ruta válida en el sistema
  if (isset($_GET["ruta"])) {
    if (
      $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "salir" ||
      $_GET["ruta"] == "VUsuario" ||
      $_GET["ruta"] == "VEmpleado" ||
      $_GET["ruta"] == "VCliente"
    ) {
      include "asideMenu.php"; // Menú lateral
      include $_GET["ruta"] . ".php"; // Página seleccionada
      include "footer.php"; // Footer
    }
  } else {
    include "vista/login.php"; // Si no hay ruta, cargar el login
  }
} else {
  include "vista/login.php"; // Si no hay sesión, cargar el login
}
?>

<!-- Carga de scripts -->
<!-- jQuery debe cargarse primero -->
<script src="assest/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assest/plugins/jszip/jszip.min.js"></script>
<script src="assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="assest/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE App -->
<script src="assest/dist/js/adminlte.min.js"></script>

<!-- Scripts personalizados -->
<script src="assest/js/cliente.js"></script>
<script src="assest/js/empleado.js"></script>
<script src="assest/js/usuario.js"></script>

<!-- Inicialización de DataTables -->
<script>
  $(document).ready(function() {
    $("#example1").DataTable({
      responsive: true,
      autoWidth: false
    });
  });
</script>
</body>
</html>
