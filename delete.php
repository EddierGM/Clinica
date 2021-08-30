<?php

require("funtions.php");

if (isset($_GET['id'])) {
	$id = htmlspecialchars(addslashes($_GET['id']));
	$instance = new Consulta();

	$table_name = 'persona';
	$campo = 'id';
	$instance->makeDelete($table_name, $campo, $id);

	header("location:index.php");
}
