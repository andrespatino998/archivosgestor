<?php

error_reporting(1);
require '../Models/conexion_bd.php';
$obj = new BD_PDO();
error_reporting(1);

$avatar= (isset($_POST['avatar'])) ? $_POST['avatar'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

if (isset($_POST['btninsertar'])) {

 if ($_POST['btninsertar'] == 'Modificar') {

        if (($_FILES['avatar']['tmp_name'] != "")) 
        
        {
            // Ruta donde se concentraran las imagenes
            $dir_subida = '../Util/Img/Usuarios/';
            // Obtenemos el nombre del archivo a subir
            $nombre_archivo = basename($_FILES['avatar']['name']);
            // Se prepara una variable con la ruta y el nombre del archivo para subirlo
            $fichero_subido = $dir_subida . $nombre_archivo;
            
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $fichero_subido)) {

              $foto =  $fichero_subido;
              $_SESSION["avatar"] = $foto;
                $obj->Ejecutar_Instruccion("UPDATE usuarios set avatar = '" . $fichero_subido . "' where id = '" . $_POST['txtid'] . "'");
          
            }
        } 
    } 

}

?>