<?php
require_once "funtions.php";
$instance = new Consulta();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">
                    Agregar Persona
                </button>
            </div>
            <div class="col">
                <p>Crud Prueba</p>
            </div>

        </div>
    </div>

    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">1mer Nombre</th>
                <th scope="col">2do NOmbre</th>
                <th scope="col">1mre Apellido</th>
                <th scope="col">2do Apellido</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Nro Documento</th>
                <th scope="col">fechaExpedicion</th>
                <th scope="col">Tipo Persona</th>
            </tr>
        </thead>
        <?php
        $tabla = "persona";
        $result = $instance->getRegistros($tabla);
        foreach ($result as $rows) :
            if ($rows[tipo_persona] === '1') {
                $pesona = 'paciente';
                echo "
                <tr>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[id]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nombre1]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nombre2]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[apellido1]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[apellido2]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[tipo_documento]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nro_documento]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[fecha]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$pesona</td></td>
                </tr>
                ";
            } elseif ($rows[tipo_persona] === '2') {
                $pesona = 'medico';
                echo "
                <tr>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[id]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nombre1]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nombre2]</td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[apellido1]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[apellido2]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[tipo_documento]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[nro_documento]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$rows[fecha]</td></td>
                <td class='text-left'style='white-space: nowrap; width: 1px;'>$pesona</td></td>
                </tr>
                ";
            }

        endforeach;
        ?>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="post">
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Primer Nombre</label>
                            <input name="nombre1" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Segundo Nombre</label>
                            <input name="nombre2" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Primer Apellido</label>
                            <input name="apellido1" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Segundo Apellido</label>
                            <input name="apellido2" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Tipo de documento</label>
                            <select name="tipo" class="form-select" aria-label="Default select example" required>
                                <option selected>Seleccione el tipo</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="Cedula de ciudadania">Cedula de ciudadani</option>
                                <option value="Cedula de extranjera">Cedula de extranjera</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Nro Documento</label>
                            <input name="documento" type="number" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Fecha</label>
                            <input name="fecha" type="date" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-xs-6 form-group">
                            <label for="nombreempresa">Tipo de Persona</label>
                            <select name="tipopersona" class="form-select" aria-label="Default select example">
                                <option class="d-none">Seleccione el tipo</option>
                                <?php
                                $tabla = 'tipo';
                                $result = $instance->getRegistros($tabla);
                                foreach ($result as $rol) :
                                    echo "<option  value='$rol[id]'> $rol[tipo]</option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <input name="form" type="hidden" class="form-control" value="users">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        tabla = $("#tabla").DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            }
        });

    });
</script>
<!-- plugins modal js -->
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

</html>