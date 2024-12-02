<?php
require_once "conexion.php";

class ModeloCliente {
    // Obtener acceso a un cliente específico
    static public function mdlAccesoCliente($cliente) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM Clientes WHERE email_cliente = :cliente");
        $stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Obtener información de todos los clientes
    static public function mdlInfoClientes() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM Clientes");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Registrar un nuevo cliente
    static public function mdlRegCliente($data) {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO Clientes ( nit_ci, direccion, nombre_contacto, telefono, email, estado) 
             VALUES (:nit_ci, :direccion, :nombre_contacto, :telefono, :email, 'Activo')"
        );
        $stmt->bindParam(":nit_ci", $data["nitCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $data["direccionCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_contacto", $data["nombreCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefonoCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["emailCliente"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    // Obtener información de un cliente específico
    static public function mdlInfoCliente($id) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM Clientes WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Editar información de un cliente
    static public function mdlEditCliente($data) {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE Clientes 
             SET nit_ci = :nit_ci, direccion = :direccion, 
                 nombre_contacto = :nombre_contacto, telefono = :telefono, email = :email 
             WHERE id_cliente = :id"
        );
        
        $stmt->bindParam(":nit_ci", $data["nitCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $data["direccionCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_contacto", $data["nombreCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefonoCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["emailCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    // Eliminar un cliente
    static public function mdlEliCliente($id) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM Clientes WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    // Buscar cliente por NIT/CI
    static public function mdlBusCliente($nitCliente) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM Clientes WHERE nit_ci = :nit_ci");
        $stmt->bindParam(":nit_ci", $nitCliente, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Contar el total de clientes
    public static function mdlCantidadClientes() {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cliente FROM clientes");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna el resultado como un arreglo asociativo
    }
}
