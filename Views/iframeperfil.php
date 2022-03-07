
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


        <link rel="icon" href="../Util/Img/home.ico">

     
    <!-- Custom styles for this template-->
    <link href="../Util/Css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Util/Css/fotoperfil3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Util/Css/estilo.css">
    <link href="../Util/Css/sweetalert2.min.css" rel="stylesheet">
    <link href="../Util/Css/toastr.min.css" rel="stylesheet">
   

    <script type="text/javascript" src="../Util/Js/loader.js"></script>




</head>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Mi Perfil de Empleado</h1>
                         <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos Personales</h6>
                                       
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Nombre Completo</label>
                                                        <input type="text" class="form-control" value="<?php echo utf8_encode($_SESSION["nombre"]);?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Correo Electrónico</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["s_usuario"]; ?>" readonly>
                                                    </div>
                                                </div>  
                                            </div> 
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Fecha de Nacimiento</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["fecha_nacimiento"];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Teléfono</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["telefono"]; ?>" readonly>
                                                    </div>
                                                </div>  
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Celular</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["celular"]; ?>" readonly>
                                                    </div>
                                                </div>  
                                            </div>  
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Contacto Emergencia</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["contacto_emergencia"];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Domicilio</label>
                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["domicilio_anterior"]; ?>" readonly>
                                                    </div>
                                                </div>  
                                            </div>    
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Foto de Perfil</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body" style="height:315px">
                                         <br>
                                        <center>
                                            <img  class="img-profile rounded-circle"   src="<?php echo  $_SESSION["avatar"]; ?>"  width="230"  height="230" style="text-align:center;" >
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                    <!-- Area Chart -->
                                    <div class="col-xl-4 col-lg-4">
                                            <div class="card shadow mb-4">
                                         
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Datos Médicos</h6>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                             <div class="form-group">
                                                                <label for="nombre" class="col-form-label">IMSS</label>
                                                                 <input type="text" class="form-control" value="<?php echo  $_SESSION["imss"]; ?>" readonly>
                                                            </div>
                                                         </div> 
                                                         <div class="col-lg-6">
                                                             <div class="form-group">
                                                                <label for="nombre" class="col-form-label">Tipo de Sangre</label>
                                                                 <input type="text" class="form-control" value="<?php echo  $_SESSION["tipo_sangre"]; ?>" readonly>
                                                            </div>
                                                         </div> 
                                                         <div class="col-lg-6">
                                                             <div class="form-group">
                                                                <label for="nombre" class="col-form-label">Examen Toxicológico</label>
                                                                 <input type="text" class="form-control" value="<?php echo  $_SESSION["examen_tox"]; ?>" readonly>
                                                            </div>
                                                         </div> 
                                                         <div class="col-lg-12">
                                                             <div class="form-group">
                                                                <label for="nombre" class="col-form-label">Enfermedades</label>
                                                                 <input type="text" class="form-control" value="<?php echo  $_SESSION["enfermedades"]; ?>" readonly>
                                                            </div>
                                                         </div> 
                                                    </div> 

                                                </div>    
                                            </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Datos Laborales</h6>
                                                
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="nombre" class="col-form-label">RFC</label>
                                                                    <input type="text" class="form-control" value="<?php echo  $_SESSION["rfc"]; ?>" readonly>
                                                                </div>
                                                        </div> 
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="nombre" class="col-form-label">CURP</label>
                                                                    <input type="text" class="form-control" value="<?php echo  $_SESSION["curp"]; ?>" readonly>
                                                                </div>
                                                        </div> 
                                                    
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="nombre" class="col-form-label">Fecha de Ingreso</label>
                                                                    <input type="text" class="form-control" value="<?php echo  $_SESSION["fecha_ingreso"]; ?>" readonly>
                                                                </div>
                                                        </div> 
                                                    </div>   
                                                </div>    
                                            </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Datos Extra</h6>
                                                
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="nombre" class="col-form-label">Departamento</label>
                                                                    <input type="text" class="form-control" value="<?php echo utf8_encode($departamentos[0]["departamento"]); ?>" readonly>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="nombre" class="col-form-label">Nivel de Criticidad</label>
                                                                    <input type="text" class="form-control" value="<?php echo $nivel_criticidad[0]["nivel_criticidad"]; ?>" readonly>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nombre" class="col-form-label">Carta de Antecedentes</label>
                                                                        <input type="text" class="form-control" value="<?php echo  $_SESSION["fecha_ingreso"]; ?>" readonly>
                                                                    </div>
                                                            </div> 
                                                    </div>   
                                                </div>    
                                            </div>
                                    </div>
                            </div>
            </div>
                <!-- /.container-fluid -->

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