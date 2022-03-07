<?php 

session_start();

//ARCHIVO NECESARIO PARA CAMBIAR LA FOTO DE PERFIL DEL USUARIO
require '../Controllers/FotoPerfil.php';

//SEGURIDAD PARA EL INICIO DE SESION
if(!isset($_SESSION["id"]))
    header('location:../index.php');

    
    
if($_SESSION["admin"]=="0")
header('location:carpetas.php');

    

 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor | Usuarios</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        
        <link rel="icon" href="../Util/Img/user.ico">

    <!-- Custom styles for this template -->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

    <link href="../Util/Css/toastr.min.css" rel="stylesheet">
    <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">

    <link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
</head>

<body id="page-top">

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
               <iframe src="tabla.php" width="100%" height="100%" frameborder="0">
            
                 
               </iframe>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 

            require_once 'Layouts/footer.php'

            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../Util/Js/sweetalert2.min.js"></script>
  
    <?php 

require_once 'Layouts/librerias.php'

?>
  <script src="../Views/Layouts/fotoperfil.js"></script>
</body>

</html>