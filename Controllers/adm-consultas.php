<?php


require_once "../Models/basededatos1.php";
include_once '../Models/conexion.php';
$tabla_usuarios = tabla_usuarios();
$conexion = conexion();	 
$id=$_SESSION['id'];
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;

        try{
            $pdo = new PDO($servidor,USUARIO,PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
            );

        //echo "<script> alert('Conectando.')</script>";
        }
        catch(PDOException $e){
        //  echo "<script>alert('Error.')</script>";
        }

      
$consulta=$pdo->prepare("SELECT * FROM $tabla_usuarios WHERE conectado='1'");
$consulta->execute();
$usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);


function en_linea($id){
   
         $conexion = conexion();  
         $tabla=tabla_usuarios();             
         $sql="SELECT * FROM $tabla WHERE id='$id'" ;              
         $result=mysqli_query($conexion,$sql);   ;       
         $estado=['conectado'];
    return $estado;
    //devuelve 1 o 0
    }
    
?>