<?php
session_start();

include_once 'Models/conexion.php';
  require 'Models/conexion_bd.php';
    $obj = new BD_PDO();
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$info = array();
//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$nombre ="";

//$pass = md5($password); PARA ENCRIPTAR 
$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD
//AND baja = '0'
$consulta = "SELECT * FROM usuarios WHERE  (correo='$usuario' and contrasena='$pass') AND baja = '0' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();




if($resultado->rowCount() >= 1){
    $info=$obj->Ejecutar_Instruccion($consulta);
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
  
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["id_departamento"] =$info[0]["id_departamento"];
    $_SESSION["nombre"] =$info[0]["nombre"];
    $_SESSION["id"] =$info[0]["id"];
    $_SESSION["avatar"] =$info[0]["avatar"];
    $_SESSION["contrasena"] =$password;
    $_SESSION["admin"] =$info[0]["admin"];
    $_SESSION["fecha_nacimiento"] =$info[0]["fecha_nacimiento"];
    $_SESSION["telefono"] =$info[0]["telefono"];
    $_SESSION["celular"] =$info[0]["celular"];
    $_SESSION["contacto_emergencia"] =$info[0]["contacto_emergencia"];
    $_SESSION["domicilio_anterior"] =$info[0]["domicilio_anterior"];
    $_SESSION["imss"] =$info[0]["imss"];
    $_SESSION["tipo_sangre"] =$info[0]["tipo_sangre"];
    $_SESSION["examen_tox"] =$info[0]["examen_tox"];
    $_SESSION["enfermedades"] =$info[0]["enfermedades"];
    $_SESSION["rfc"] =$info[0]["rfc"];
    $_SESSION["curp"] =$info[0]["curp"];
    $_SESSION["fecha_ingreso"] =$info[0]["fecha_ingreso"];
    $_SESSION["carta_antecedentes"] = $info[0]["carta_antecedentes"];

    $sql=$obj->Ejecutar_Instruccion("UPDATE usuarios SET conectado='1' WHERE correo='$usuario' and contrasena='$pass' ");
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;


//usuario:admin pass:12345
//usuario:demo pass:demo