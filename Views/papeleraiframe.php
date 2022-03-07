<script src="../Util/Js/sweetalert2.min.js"></script>
<?php 


error_reporting(1);

 include_once "../Models/conexion_bd.php";
 $obj = new BD_PDO();
    if (isset($_GET["id"]) && isset($_GET["eliminar"]))
    {
        //ELIMINAR DEFINITIVAMENTE
        $archivo = $obj->Ejecutar_Instruccion("SELECT * FROM papelera where id=".$_GET['id']);
        $eliminar = $obj->Ejecutar_Instruccion("DELETE from papelera where id = '".$_GET['id']."'");
        $ruta = $archivo[0]["file_path"];
        unlink('../assets/uploads/'.$ruta);
    }

    else if(isset($_GET["id"]) && isset($_GET["recuperar"]))
    {
        //GUARDAR LOS DATOS
        $archivo = $obj->Ejecutar_Instruccion("SELECT * FROM papelera where id=".$_GET['id']);
        $id = $archivo[0]["id"];
        $name = $archivo[0]["name"];
        $description= $archivo[0]["description"];
        $user_id= $archivo[0]["user_id"];
        $folder_id= $archivo[0]["folder_id"];
        $file_type= $archivo[0]["file_type"];
        $file_path= $archivo[0]["file_path"];
        $is_public= $archivo[0]["is_public"];
        
        //INSERTAR EN FILES 
        $insertar = "INSERT INTO files(id,name,description,user_id,folder_id,file_type,file_path,is_public) 
        VALUES('".$id."','".$name."','". $description."','".$user_id."','".$folder_id."','".$file_type."','".$file_path."','".$is_public."')";

        $obj->Ejecutar_Instruccion($insertar);

        //ELIMINAR DE PAPELERA
        $eliminar = "DELETE FROM papelera WHERE id = $id";
        $obj->Ejecutar_Instruccion($eliminar);
        //echo $eliminar ;


        
    }
 
  
?>
 
 


<!-- Custom fonts for this template -->
<link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet"  type="text/css" href="../Util/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

     
    <!-- Custom styles for this template -->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../Util/Css/datatables.min.css"/>
    <!-- Custom styles for this page -->
    <link href="../Util/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"  type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  


      <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">

      <link href="../Util/Css/toastr.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      


<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Papelera de Archivos</h1>

        </div>
  
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaPapelera" width="100%" >
                  
                        <thead>
                           
                            <tr>
                                <center><h5 style="color: red">¡¡Los archivos se eliminarán definitivamente cada semana!!</h5></center>
                                <th style="font-size: 18px;">Id</th>
                                <th style="font-size: 18px">Nombre</th>
                                <th style="font-size: 18px">Descripción</th>
                                <th style="font-size: 18px">User ID</th>
                                <th style="font-size: 18px">Folder ID</th>
                                <th style="font-size: 18px">Tipo de Archivo</th>
                                <th style="font-size: 18px">File path</th>
                                <th style="font-size: 18px">Is public</th>
                                <th style="font-size: 18px">Fecha de Eliminación</th>
                                <th style="font-size: 18px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 8px 15px;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>




 
    <!-- Custom scripts for all pages-->
    <script src="../Util/Js/sb-admin-2.min.js"></script>


    <script src="../Util/Js/jquery-3.3.1.min.js"></script>
    <script src="../Util/Js/bootstrap.min.js"></script>
    <script src="../Util/Js/popper.min.js"></script>
   


    <script type="text/javascript" src="../Util/datatables/datatables.min.js"></script>

    <script src="../Util/Js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../Util/Js/toastr.min.js"></script>
    <script type="text/javascript" src="papelera.js"></script>

    <script src="../Util/Js/jquery.validate.min.js"></script>
    <script src="../Util/Js/additional-methods.min.js"></script>
