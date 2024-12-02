<?php
require_once "modelo/empleadoModelo.php";

class ControladorEmpleado {
    public static function ctrInfoEmpleados() {
        return ModeloEmpleado::mdlInfoEmpleados();
    }

    public static function ctrInfoEmpleado($id) {
        return ModeloEmpleado::mdlInfoEmpleado($id);
    }

    public static function ctrRegEmpleado() {
        $data = [
            "nombre_completo" => $_POST["nombre_completo"],
            "cargo" => $_POST["cargo"],
            "telefono" => $_POST["telefono"],
            "email" => $_POST["email"]
        ];
        echo ModeloEmpleado::mdlRegEmpleado($data);
    }

    public static function ctrEditEmpleado() {
        $data = [
            "id" => $_POST["id_empleado"],
            "nombre_completo" => $_POST["nombre_completo"],
            "cargo" => $_POST["cargo"],
            "telefono" => $_POST["telefono"],
            "email" => $_POST["email"]
        ];
        echo ModeloEmpleado::mdlEditEmpleado($data);
    }

    public static function ctrEliEmpleado() {
        $id = $_POST["id"];
        echo ModeloEmpleado::mdlEliEmpleado($id);
    }

    static public function ctrCantidadEmpleados() {
        $empleado = ModeloEmpleado::mdlCantidadEmpleados();  // Recupera la cantidad de empleados
        return $empleado ? $empleado['empleado'] : 0;  // Retorna el número de empleados o 0 si no hay
    }
}
