<?php
error_reporting();
require_once "funtions.php";
$instance = new Consulta();

if (isset($_GET['id'])) {
    $id = htmlentities(addslashes($_GET['id']));
    $table_name = 'persona';
    $row = $instance->selectUpdate($table_name, $id);

    foreach ($row as $e) {

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

        <body><br>
                <center><h1>Actualizar</h1></center>
                <br><br>
                
            <div class="container border border-info"><br>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <form action="update.php" method="post">
                            <div class="row">
                                <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['id'] ?>" required>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Primer Nombre</label>
                                    <input name="nombre1" type="text" class="form-control" value="<?php echo $e['nombre1'] ?>" required>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Segundo Nombre</label>
                                    <input name="nombre2" type="text" class="form-control" value="<?php echo $e['nombre2'] ?>" required>
                                </div>
                            </div>                       
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Primer Apellido</label>
                                    <input name="apellido1" type="text" class="form-control" value="<?php echo $e['apellido1'] ?>" required>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Segundo Apellido</label>
                                    <input name="apellido2" type="text" class="form-control" value="<?php echo $e['apellido2'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Tipo de documento</label>
                                    <select name="tipo" class="form-select" aria-label="Default select example" required>
                                        <option value="<?php echo $e['tipo_documento'] ?>"><?php echo $e['tipo_documento'] ?></option>
                                        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                        <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                                        <option value="Cedula de extranjera">Cedula de extranjera</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nombreempresa">Nro Documento</label>
                                    <input name="documento" type="number" class="form-control" value="<?php echo $e['nro_documento'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="nombreempresa">Fecha</label>
                                <input name="fecha" type="date" class="form-control" value="<?php echo $e['fecha'] ?>" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="nombreempresa">Tipo de Persona</label>
                                <select name="tipopersona" class="form-select" aria-label="Default select example">
                                    <option value="<?php echo $e['tipo_persona'] ?>">
                                        <?php
                                        $tp = $e['tipo_persona'];
                                        if ($tp === '1') {
                                            echo 'paciente';
                                        } elseif ($tp === '2') {
                                            echo 'medico';
                                        }
                                        ?>
                                    </option>
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
                            
                            <br><br><br><br>
                            <center> <a href="index.php" class="btn btn-secondary">Cerrar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button> </center>
                            <br><br>

                        </form>
                    </div>
                </div>
            </div>

        </body>

        </html>
<?php
    }
}
?>