<?php
/*controladores*/
require_once "controlador/plantillaControlador.php";
require_once "controlador/usuarioControlador.php";
require_once "controlador/clienteControlador.php";
require_once "controlador/empleadoControlador.php";


require_once "modelo/usuarioModelo.php";
require_once "modelo/clienteModelo.php";
require_once "modelo/empleadoModelo.php";


$plantilla=new controladorPlantilla();
$plantilla->ctrPlantilla();