

<?php 

session_start();



include "../Models/config.php";
require "../Controllers/adm-consultas.php";



$count_files = mysqli_query($con, "select * from files");
$count_departamentos = mysqli_query($con, "select * from departamentos");
$count_folders = mysqli_query($con, "select * from folders");
$count_user=mysqli_query($con, "select * from usuarios");


require '../Controllers/FotoPerfil.php';


if(!isset($_SESSION["id"]))
    header('location:../index.php');
    
    
    if($_SESSION["admin"]=="0")
    header('location:files.php?page=files');

    

?>
  <title>Gestor | Inicio</title>

<!-- Custom fonts for this template-->
<link href="../Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">


    <link rel="icon" href="../Util/Img/home.ico">

 
<!-- Custom styles for this template-->
<link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
<link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../Util/Css/estilo.css">
<link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">
<link href="../Util/Css/toastr.min.css" rel="stylesheet">


<script type="text/javascript" src="../Util/Js/loader.js"></script>
<div class="container-fluid">

                 
    <h1 class="h3 mb-4 text-gray-800">Dashboard / Inicio</h1>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #2B0082;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-uppercase mb-1" style="color:#2B0082;">
                                Empleados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows($count_user); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #2B0082;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold  text-uppercase mb-1 "  style="color:#2B0082;">
                                Departamentos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows($count_departamentos); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #2B0082;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-uppercase mb-1"  style="color:#2B0082;">
                                Carpetas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows($count_folders); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #2B0082;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold  text-uppercase mb-1"  style="color:#2B0082;">
                                Archivos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows($count_files); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafica de Barras | Empleados y Departamentos</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="contenedor-modal" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> 
        </div>



    </div>

    <div class="row">
        
            <div class="col-xl-7 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Grafica de Barras | Empleados y Departamentos</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="contenedor" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div> 
            </div>

            <div class="col-xl-5 col-lg-5">                    
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Usuarios Online</h6>
                            
                            </div>

                            <div class="card-body" style="text-align:center; ">
                                <div class="cuerpo"  >
                                    <div class="contenedor" style="text-align:left">
                                        <div class="seccion2" id="refrescar">
                                            
                                                    <?php 
                                                    foreach($usuario as $mostrar){ ?>

                                                    <div class="contacto">
                                                        <div class="imagen" > 
                                                                <img style="height:50px; width:50px;" src="<?php echo $mostrar['avatar'];?>" alt="">
                                                                <?php 
                                                                if(en_linea($mostrar['id'])) 
                                                                    echo'<div name="punto"></div>';
                                                                ?>                  

                                                        </div>
                                                            <div class="nombre">
                                                                <div><?php echo $mostrar['nombre'];?> </div>
                                                            </div>
                                                    </div>
                                                    <?php }?>
                                            </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    

            </div>  
        
    </div>

    <?php 

require_once 'Layouts/librerias.php'

?>
  <script src="../Util/Js/Highcharts_7.0.3/code/highcharts.js"></script>
        <script src="../Util/Js/Highcharts_7.0.3/code/modules/exporting.js"></script>
        <script src="../Util/Js/Highcharts_7.0.3/code/modules/export-data.js"></script>        
        
        <script src="../Util/Js/Highcharts_7.0.3/code/modules/drilldown.js"></script>
        <script src="graficas.js"></script>
        <script src="graficalineas.js"></script>

<script src="../Views/Layouts/fotoperfil.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../Views/Layouts/fotoperfil.js"></script>
    <script>
    function actualizar(){    
    $.ajax({
        type: 'POST',
        url: '../Controllers/refrescar.php',
        success: function(respuesta) {          
            $('#refrescar').html(respuesta);
       }
    });    
    }
    setInterval(function(){actualizar();},1000)
    </script>
</div>

      