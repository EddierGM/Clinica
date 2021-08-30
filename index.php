<?php
require_once "funtions.php";
$instance = new Consulta();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
        <div class="col">
         <center><h1>Clinica</h1></center>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#form">
             Agregar Persona
            </button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Tipo Personas
          </button>
                
        </div>
        </div>
        <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">1mer Nombre</th>
                <th scope="col">2do NOmbre</th>
                <th scope="col">1mer Apellido</th>
                <th scope="col">2do Apellido</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Nro Documento</th>
                <th scope="col">fechaExpedición</th>
                <th scope="col">Tipo Persona</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <?php
        $tabla = "persona";
        $result = $instance->getRegistros($tabla);
        foreach ($result as $rows) :
            $tipo = $rows[tipo_persona];
            if ($tipo === '1') {
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
                <td class='text-center'style='white-space: nowrap; width: 1px;'>
                    <a class='btn btn-info text-center shadow' href='modal_update.php?id=" . $rows['id'] . "'><i class='fas fa-edit'></i></a>
                </td>
                <td class='text-center'style='white-space: nowrap; width: 1px;'>
                    <a class='btn btn-danger text-center shadow' href='delete.php?id=" . $rows['id'] . "'><i class='fas fa-trash-alt'> </i></a>
                </td>
                </tr>
                ";
            } elseif ($tipo === '2') {
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
                <td class='text-center'style='white-space: nowrap; width: 1px;'>
                    <a class='btn btn-info text-center shadow' href='modal_update.php?id=" . $rows['id'] . "'><i class='fas fa-edit'></i></a>
                </td>
                <td class='text-center'style='white-space: nowrap; width: 1px;'>
                    <a class='btn btn-danger text-center shadow' href='delete.php?id=" . $rows['id'] . "'><i class='fas fa-trash-alt'> </i></a>
                </td>
                </tr>
                ";
            }

        endforeach;
        ?>
    </table>
    </div>

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
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Primer Nombre</label>
                            <input name="nombre1" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Segundo Nombre</label>
                            <input name="nombre2" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Primer Apellido</label>
                            <input name="apellido1" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Segundo Apellido</label>
                            <input name="apellido2" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Tipo de documento</label>
                            <select name="tipo" class="form-select" aria-label="Default select example" required>
                                <option selected>Seleccione el tipo</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="Cedula de ciudadania">Cedula de ciudadani</option>
                                <option value="Cedula de extranjera">Cedula de extranjera</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Nro Documento</label>
                            <input name="documento" type="number" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
                            <label for="nombreempresa">Fecha</label>
                            <input name="fecha" type="date" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-xs-3 form-group">
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
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

</html>