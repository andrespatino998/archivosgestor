<?php

include_once '../Models/conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';
$id_departamento = (isset($_POST['id_departamento'])) ? $_POST['id_departamento'] : '';
$fecha_ingreso = (isset($_POST['fecha_ingreso'])) ? $_POST['fecha_ingreso'] : '';
$fecha_nacimiento = (isset($_POST['fecha_nacimiento'])) ? $_POST['fecha_nacimiento'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$celular= (isset($_POST['celular'])) ? $_POST['celular'] : '';
$contacto_emergencia= (isset($_POST['contacto_emergencia'])) ? $_POST['contacto_emergencia'] : '';
$domicilio_anterior= (isset($_POST['domicilio_anterior'])) ? $_POST['domicilio_anterior'] : '';
$rfc= (isset($_POST['rfc'])) ? $_POST['rfc'] : '';
$curp= (isset($_POST['curp'])) ? $_POST['curp'] : '';
$imss= (isset($_POST['imss'])) ? $_POST['imss'] : '';
$tipo_sangre= (isset($_POST['tipo_sangre'])) ? $_POST['tipo_sangre'] : '';
$carta_antecedentes= (isset($_POST['carta_antecedentes'])) ? $_POST['carta_antecedentes'] : '';
$examen_tox= (isset($_POST['examen_tox'])) ? $_POST['examen_tox'] : '';
$enfermedades= (isset($_POST['enfermedades'])) ? $_POST['enfermedades'] : '';
$admin= (isset($_POST['squaredTwo'])) ? $_POST['squaredTwo'] : '';
$inicio = (isset($_POST['inicio'])) ? $_POST['inicio'] : '';
$final = (isset($_POST['final'])) ? $_POST['final'] : '';

$vacaciones = $inicio." / ".$final;

//$contrasena_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);
$avatar = "../Util/Img/user_default.png";
$contrasena_cifrada = md5($contrasena);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';





switch($opcion){

    case 1:

    
        $consulta = "INSERT INTO usuarios (nombre, correo, contrasena,avatar,id_departamento,fecha_ingreso,fecha_nacimiento,telefono,celular,contacto_emergencia,domicilio_anterior,rfc,curp,imss,tipo_sangre,carta_antecedentes,examen_tox,enfermedades,admin) VALUES('$nombre', '$correo', '$contrasena_cifrada','$avatar','$id_departamento','$fecha_ingreso','$fecha_nacimiento','$telefono','$celular','$contacto_emergencia','$domicilio_anterior','$rfc','$curp','$imss','$tipo_sangre','$carta_antecedentes','$examen_tox','$enfermedades','$admin') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
    
        var_dump($consulta);
        $consulta = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET nombre='$nombre',correo='$correo', id_departamento='$id_departamento', fecha_ingreso ='$fecha_ingreso', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', celular='$celular', contacto_emergencia='$contacto_emergencia', domicilio_anterior='$domicilio_anterior', rfc='$rfc', curp='$curp', imss='$imss', tipo_sangre='$tipo_sangre', carta_antecedentes='$carta_antecedentes',examen_tox='$examen_tox',enfermedades='$enfermedades',admin=$admin     WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE id ='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:   
       
        $consulta = "DELETE FROM usuarios WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
         $resultado->execute();   
        break;
    case 4:    
        $consulta = "SELECT * FROM departamentos inner join usuarios on departamentos.id= usuarios.id_departamento  WHERE baja = '1'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
     case 5:        
        $consulta = "UPDATE usuarios SET vacaciones='$vacaciones' WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
            
        $consulta = "SELECT * FROM usuarios WHERE id ='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 6:    
        $consulta = "UPDATE usuarios SET baja = 0 WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
      
        $consulta = "SELECT * FROM usuarios WHERE id ='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
}


print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;


?>
