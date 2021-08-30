<?php
//llamamos el archivo de las funciones
require("funtions.php");

//inicializamos la consulta
$instance = new Consulta();

//asignamos los name de los post a la variable en que se va a encapsular
$nombre1 = htmlentities(addslashes(strtoupper($_POST['nombre1'])));
$nombre2 = htmlentities(addslashes(strtoupper($_POST['nombre2'])));
$apellido1 = htmlentities(addslashes($_POST['apellido1']));
$apellido2 = htmlentities(addslashes(strtoupper($_POST['apellido2'])));
$tipo = htmlentities(addslashes(strtoupper($_POST['tipo'])));
$documento = htmlentities(addslashes($_POST['documento']));
$fecha = htmlentities(addslashes(strtoupper($_POST['fecha'])));
$tipopersona = htmlentities(addslashes(strtoupper($_POST['tipopersona'])));
$table_name = 'persona';

//le mandamos a la funsion las variables de los campos y del nombre de la tabla
$instance->makeInsert_personas($nombre1, $nombre2, $apellido1, $apellido2, $tipo, $documento, $fecha, $tipopersona, $table_name);

//por ultimo le mandamos la ruta de redireccion al haberse hecho la insersion
header("location: index.php");
