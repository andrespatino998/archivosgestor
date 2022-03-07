<?php
header('Content-type: application/json');
include_once '../Models/conexiongraficos.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$result = array();

$consulta = "SELECT 'Carpetas', COUNT(*) AS cantidad FROM folders UNION SELECT 'Archivos' , COUNT(*) FROM files UNION SELECT 'Archivos en papelera' , COUNT(*) FROM papelera";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    array_push($result, array($fila["Carpetas"], $fila["cantidad"] ));
}

print json_encode($result, JSON_NUMERIC_CHECK);
$conexion=null;