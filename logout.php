<?php

include_once 'Models/conexion.php';
  require 'Models/conexion_bd.php';
    $obj = new BD_PDO();
$objeto = new Conexion();

session_start();

$conexion = $objeto->Conectar();

    $sql=$obj->Ejecutar_Instruccion("UPDATE usuarios SET conectado='0' WHERE id='".$_SESSION['id']."' " );
    

unset($_SESSION["s_usuario"]);
unset($_SESSION["nombre"]);
unset($_SESSION["id"]);
unset($_SESSION["avatar"]);
unset($_SESSION["contrasena"]);
unset($_SESSION["admin"]);
unset($_SESSION["fecha_nacimiento"]);
unset($_SESSION["telefono"]);
unset($_SESSION["celular"]);
unset($_SESSION["contacto_emergencia"]);
unset($_SESSION["domicilio_anterior"]);
unset($_SESSION["imss"]);
unset($_SESSION["tipo_sangre"]);
unset($_SESSION["examen_tox"]);
unset($_SESSION["enfermedades"]);
unset($_SESSION["rfc"]);
unset($_SESSION["curp"]);
unset($_SESSION["fecha_ingreso"]);
unset($_SESSION["id_departamento"]);
unset($_SESSION["carta_antecedentes"]);



session_unset(); 
session_destroy();
header("Location:index.php");
?>