
<?php 

session_start();




require '../Controllers/FotoPerfil.php';



if(!isset($_SESSION["id"]))
    header('location:../index.php');

   

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor | Autor</title>

    <!-- Custom fonts for this template-->
    <link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="icon" href="../Util/Img/autor.ico">

     
    <!-- Custom styles for this template-->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
 
    <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">
    <link href="../Util/Css/toastr.min.css" rel="stylesheet">

    <link href="../Util/Css/default/style.min.css" rel="stylesheet">



</head>

<body id="page-top">
    
<style>

.centrar-listas {
	text-align: center;
}

.centrar-listas ul,
.centrar-listas ol {
	text-align: left;
	display: inline-block;
}

</style>



    <!-- Page Wrapper -->
<div id="wrapper">

        <!-- Sidebar -->
        <?php 

            require_once 'Layouts/sidebar.php'

            ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
        <div id="content">

                <!-- Topbar -->
                        <?php 

                    require_once 'Layouts/topbar.php'

                    ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Acerca del autor</h6>
                                 
                                </div>
                                <!-- Card Body -->
                                <div class="card-body py-5">
                                       <p >Hola! Somos Alumnos de la Universidad Tecnol&oacute;gica del Norte de Coahuila, creadores del  <strong>Sistema para el Manejo y Control de Archivos Administrativos de la Agencia Aduanal Alfonso Bres.</strong></p><br>
                                        <h4>Descripción</h4>
                                       <p ><strong>Sistema para el Manejo y Control de Archivos Administrativos de la Agencia Aduanal Alfonso Bres</strong> es un sistema para gestionar, controlar, compartir archivos y carpetas importantes de la Agencia, además de llevar un control de los departamentos y empleados que existen dentro de la Agencia.</p>

                                </div>
                            </div> 
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> Universidad Tecnol&oacute;gia del Norte de Coahuila</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <center>
                                        <img  class="img-profile" src="../Util/Img/utnc_cuadro.jpg"  width="300" style="text-align:center;" >
                                    </center>
                                
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <?php 
                            if ($_SESSION["admin"]=="1") 
                            {
                            echo'<div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                            
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Modulos</h6>
                                
                                </div>
                     
                                <div class="card-body">
                                <p>Definimos a grandes rasgos los modulos generales del sistema</p>
                                        <ul style="text-align:justify">
                                            <li type="disc"><b>Empleados: </b>Se pueden registrar para acceder a sus cuentas.</li>
                                            <li type="disc"><b>Departamentos: </b>Se podra registrar, eliminar y modificar los departamentos de la agencia.</li>
                                            <li type="disc"><b>Subir archivos: </b> El administrador podra subir archivos importantes en las carpetas y subcarpetas</li>
                                            <li type="disc"><b>Crear carpetas y subcarpetas: </b> El administrador podra crear carpetas y subcarpetas ademas podra visualizarlas en su muro.</li>
                                            <li type="disc"><b>Papelera de Reciclaje: </b> El administrador podra ver los archivos y la carpetas que hayan sido eliminadas.</li>
                                            
                                        </ul>
                                </div>
                            </div> 
                        </div>';
                            }
                        ?> 
                           

                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"> Creadores del sistema</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="centrar-listas">
                                            <ul>
                                                <li type="disc">Jorge Alberto Pacheco Sarkis.</li>
                                                <li type="disc">Juan Andres Patiño Melendez.</li>
                                                <li type="disc">Pablo Antonio Molina Batrez.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                <!-- row -->

                </div>
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


  

    <?php 

require_once 'Layouts/librerias.php'

?>

<script src="../Util/Js/jquery-3.4.1.min.js"></script>





<script src="../Views/Layouts/fotoperfil.js"></script>






</body>

</html>