<?php
include_once '../Models/conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();
$departamento= (isset($_POST['departamento'])) ? $_POST['departamento'] : '';
$nivel_criticidad = (isset($_POST['nivel_criticidad'])) ? $_POST['nivel_criticidad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){

    case 1:

        $consulta = "INSERT INTO departamentos(departamento,nivel_criticidad) VALUES('$departamento', '$nivel_criticidad')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
    
        var_dump($consulta);
        $consulta = "SELECT * FROM departamentos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  
        break;    
    case 2:        
        $consulta = "UPDATE departamentos SET departamento='$departamento', nivel_criticidad='$nivel_criticidad'  WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM departamentos WHERE id ='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:     
        $consulta = "DELETE FROM departamentos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();            
        break;
    case 4:    
        $consulta = "SELECT * FROM departamentos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "SELECT * FROM departamentos inner join usuarios on departamentos.id= usuarios.id_departamento";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break; 
}
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;


