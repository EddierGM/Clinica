<?php
//llamamos las funciones
require("funtions.php");

$table_name = 'usuario';

$id = htmlentities(addslashes($_POST['id']));
$nombre = htmlentities(addslashes(strtoupper($_POST['nombre_usuario'])));
$clave = htmlentities(addslashes(strtoupper($_POST['clave_usuario'])));
$rol = htmlentities(addslashes($_POST['rol']));

$instance = new Consulta();
$instance->makeUpdate($table_name, $id, $nombre, $clave, $rol);
header("location: index.php");
