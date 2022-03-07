<?php 

session_start();



include "../Models/config.php";
require "../Controllers/adm-consultas.php";




require '../Controllers/FotoPerfil.php';


if(!isset($_SESSION["id"]))
    header('location:../index.php');
    


?>
	<?php  
			
			  
			include_once '../Models/conexion_bd.php';
			$obj = new BD_PDO();
			
            $departamentos=$obj->Ejecutar_Instruccion("SELECT departamento FROM departamentos inner join usuarios on departamentos.id= usuarios.id_departamento WHERE departamentos.id = '".$_SESSION["id_departamento"]."'"); 
		    $nivel_criticidad=$obj->Ejecutar_Instruccion("SELECT nivel_criticidad FROM departamentos inner join usuarios on departamentos.id= usuarios.id_departamento WHERE departamentos.id = '".$_SESSION["id_departamento"]."'"); 
     
			 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gestor | Inicio</title>
    <!-- Custom fonts for this template-->
    <link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="icon" href="../Util/Img/info.ico">
    <!-- Custom styles for this template-->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Util/Css/estilo.css">
    <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">
    <link href="../Util/Css/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="../Util/Js/loader.js"></script>
</head>

<body id="page-top" >

<main id="view-panel" >
     <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
  	<?php include $page.'.php' ?>
</main>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php 
            require_once 'Layouts/sidebar.php'
            ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
                <?php 
                require_once 'Layouts/topbar.php'
                ?>
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <iframe    src="iframeperfil.php" width="100%" height="100%" frameborder="0"></iframe>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php 
            require_once 'Layouts/footer.php'
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
  
    <?php 

require_once 'Layouts/librerias.php'

?>


<script src="../Views/Layouts/fotoperfil.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../Views/Layouts/fotoperfil.js"></script>

</body>
</html>