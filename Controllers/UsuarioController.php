<?php

include_once '../Models/Usuario.php';


//CONTROLADOR PARA GUARDAR LOS DATOS PARA EL LOGIN POR POST Y LLAMAR A LA FUNCION LOGUEARSE


$usuario = new Usuario();
session_start();

if($_POST['funcion']=='verificar_usuario'){
    //FUNCION PARA VERIFICAR SI HAY OTRO USUARIO EN EL SISTEMA
$username =  $_POST['value'];
$usuario->verificar_usuario($username);
if ($usuario->objetos!=null){ 
    
    echo 'success';

    }
}

   