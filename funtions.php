<?php
//traemos la conexion PDO de la caperta config 
require_once "conec.php";

//assignamos una clase extendida a laclase Conexion para envolver y ejecutar todas las funciones
class Consulta extends Conexion
{

    public function Consulta()
    {
        parent::Conexion();
    }
    //funsión getRegistros la usaremos de para traer cualquier tipo de dato de la base de datos
    //la variable $tabla es el parametro o la tabla que pasamos desde el lugar que invocamos la funsión
    public function getRegistros($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        $result = $this->link->prepare($sql);
        $result->execute(array());
        $row = $result->fetchAll(PDO::FETCH_BOTH);
        return $row;
    }
    //funsion para eliminar registros de la base de datos
    //la variable $table_name es la tabla a la que queremos borrarle un registro
    public function makeDelete($table_name, $campo, $id)
    {
        $sql = "DELETE FROM " . $table_name . " WHERE " . $campo . " = :ID";
        $result = $this->link->prepare($sql);
        $result->execute(array(":ID" => $id));
    }
    //funsion update para tabla usuarios
    public function makeUpdate($table_name, $id, $nombre, $clave, $rol)
    {
        $sql = "UPDATE " . $table_name . " SET nombre_usuario=:NOM, clave_usuario=:CLA, fk_rol_usuario=:RL  WHERE id_usuario=:ID";
        $result = $this->link->prepare($sql);
        $result->execute(array(":ID" => $id, ":NOM" => $nombre, ":CLA" => $clave, ":RL" => $rol, ":ID" => $id));
    }
    //selecciona por el get el registro a actualizar
    public function selectUpdate($table_name, $campo, $id)
    {
        $sql = "SELECT * FROM " . $table_name . " WHERE " . $campo . " = :ID";
        $result = $this->link->prepare($sql);
        $result->execute(array(":ID" => $id));

        $row = $result->fetchAll(PDO::FETCH_BOTH);

        return $row;
    }
    //funsion para insertar registros en la tabla PERSONAS
    public function makeInsert_personas($nombre1, $nombre2, $apellido1, $apellido2, $tipo, $documento, $fecha, $tipopersona, $table_name)
    {
        $sql = "INSERT INTO " . $table_name . " (nombre1, nombre2, apellido1, apellido2, tipo_documento, nro_documento, fecha, tipo_persona) values(:NOM1, :NOM2, :APE1, :APE2, :TP, :DOC, :FEC, :TPP)";
        $result = $this->link->prepare($sql);
        $result->execute(array(":NOM1" => $nombre1, ":NOM2" => $nombre2, ":APE1" => $apellido1, ":APE2" => $apellido2, ":TP" => $tipo, ":DOC" => $documento, ":FEC" => $fecha, ":TPP" => $tipopersona));
    }
}
