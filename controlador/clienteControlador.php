<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (in_array($ruta["query"], ["ctrRegCliente", "ctrEditCliente", "ctrEliCliente", "ctrBusCliente"])) {
        $metodo = $ruta["query"];
        $cliente = new ControladorCliente();
        $cliente->$metodo();
    }
}

class ControladorCliente {

    // Listar todos los clientes
    static public function ctrInfoClientes() {
        return ModeloCliente::mdlInfoClientes();
    }

    // Registrar un nuevo cliente
    static public function ctrRegCliente() {
        require "../modelo/clienteModelo.php";

        $data = [
            "nitCliente" => htmlspecialchars($_POST["nit"], ENT_QUOTES, 'UTF-8'),
            "direccionCliente" => htmlspecialchars($_POST["direccion"], ENT_QUOTES, 'UTF-8'),
            "nombreCliente" => htmlspecialchars($_POST["nombre"], ENT_QUOTES, 'UTF-8'),
            "telefonoCliente" => htmlspecialchars($_POST["telefono"], ENT_QUOTES, 'UTF-8'),
            "emailCliente" => filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)
        ];

        $respuesta = ModeloCliente::mdlRegCliente($data);
        echo $respuesta;
    }

    // Obtener información de un cliente específico
    static public function ctrInfoCliente($id) {
        return ModeloCliente::mdlInfoCliente((int)$id);
    }

    // Editar un cliente
    static public function ctrEditCliente() {
        require "../modelo/clienteModelo.php";

        $data = [
            "id" => (int)$_POST["idCliente"],
            "nitCliente" => htmlspecialchars($_POST["nit"], ENT_QUOTES, 'UTF-8'),
            "direccionCliente" => htmlspecialchars($_POST["direccion"], ENT_QUOTES, 'UTF-8'),
            "nombreCliente" => htmlspecialchars($_POST["nombre"], ENT_QUOTES, 'UTF-8'),
            "telefonoCliente" => htmlspecialchars($_POST["telefono"], ENT_QUOTES, 'UTF-8'),
            "emailCliente" => filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)
        ];

        $respuesta = ModeloCliente::mdlEditCliente($data);
        echo $respuesta;
    }

    // Eliminar un cliente
    static public function ctrEliCliente() {
        require "../modelo/clienteModelo.php";
        $id = (int)$_POST["id"];
        $respuesta = ModeloCliente::mdlEliCliente($id);
        echo $respuesta;
    }

    // Buscar cliente por NIT/CI
    static public function ctrBusCliente() {
        require "../modelo/clienteModelo.php";
        $nitCliente = htmlspecialchars($_POST["nitCliente"], ENT_QUOTES, 'UTF-8');
        $respuesta = ModeloCliente::mdlBusCliente($nitCliente);
        echo json_encode($respuesta);
    }

    // Contar el total de clientes
    static public function ctrCantidadClientes() {
        $cliente = ModeloCliente::mdlCantidadClientes();  // Obtiene la cantidad de clientes desde el modelo
        return $cliente['cliente'];  // Accede al valor del array y devuelve solo el número de clientes
    }
}
