<?php

include_once 'ConexionUsuario.php';

//CLASE QUE UTILIZA EL OBJETO CONEXION PARA PODER CONECTARSE A LA BD
class Usuario{

    var $objetos; //VARIABLE QUE RECIBE TODOS LOS RESULTADOS
    public function __construct(){

        $db = new Conexion();
        $this->acceso = $db->pdo;
        //$this->acesso YA TIENE CONEXION A LA BD
    }

    function verificar_usuario($user){
        
        // IMPRIMIR PARA VERIFICAR QUE SI ESTA DETECTANDO EL USER echo 'hola';

        //CONSULTA QUE NOS TRAE EL USUARIO PARA VERIFICAR SI EXISTE 
       
        $sql = "SELECT * FROM usuarios
                WHERE correo=:correo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$user)); //EJECUTAR EL QUERY COLOCAR PARAMETROS DE LA CONSULTA
        $this->objetos = $query->fetchAll(); //RESULTADOS DE TODA LA CONSULTA
        return $this->objetos;
    }

  
}