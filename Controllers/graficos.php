<?php
header('Content-type: application/json');
include_once '../Models/conexiongraficos.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$result = array();

$consulta = "SELECT distinct departamentos.departamento, COUNT(id_departamento) as empleados FROM departamentos INNER JOIN usuarios on departamentos.id = usuarios.id_departamento group by departamentos.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    array_push($result, array($fila["departamento"], $fila["empleados"] ));
}

print json_encode($result, JSON_NUMERIC_CHECK);
$conexion=null;