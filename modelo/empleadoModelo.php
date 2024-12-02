<?php
require_once "conexion.php";

class ModeloEmpleado {
    public static function mdlInfoEmpleados() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM empleados WHERE estado = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mdlInfoEmpleado($id) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM empleados WHERE id_empleado = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function mdlRegEmpleado($data) {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO empleados (nombre_completo, cargo, telefono, email) 
             VALUES (:nombre_completo, :cargo, :telefono, :email)"
        );
        $stmt->bindParam(":nombre_completo", $data["nombre_completo"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $data["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }

    public static function mdlEditEmpleado($data) {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE empleados 
             SET nombre_completo = :nombre_completo, cargo = :cargo, telefono = :telefono, email = :email 
             WHERE id_empleado = :id"
        );
        $stmt->bindParam(":nombre_completo", $data["nombre_completo"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $data["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }

    public static function mdlCantidadEmpleados() {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as empleado FROM empleados");
        $stmt->execute();
        return $stmt->fetch();  // Devuelve el número de empleados
    }
}
