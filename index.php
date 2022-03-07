<!DOCTYPE html>
<html lang="en">
<?php

session_start();
 

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor | Login</title>
 <link rel="shortcut icon" href="#" />
    <!-- Custom fonts for this template-->
    <link href="Util/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link rel="icon" href="Util/Img/home.ico">
    <!-- Custom styles for this template-->
    <link href="Util/Css/sb-admin-2.min.css" rel="stylesheet">


    <link href="Util/Css/boostrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="Util/Css/css/all.min.css">
     <link rel="stylesheet" href="Util/Css/sweetalert2.min.css">      

</head>

<body style="background-color: #2B0082;">

    <div class="container">
    <br><br><br><br><br>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                    </div>
                                    <form action="index.php" class="user"  id="formLogin" method="post">
                                        <div class="wrap-input100"  data-validate = "Usuario incorrecto">
                                            <input type="email" class="form-control form-control-user" 
                                                id="usuario" name="usuario" aria-describedby="emailHelp"
                                                placeholder="Correo Electrónico" >
                                        </div>
                                        <br>
                                        <div class="wrap-input100" data-validate="Password incorrecto">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Contraseña" >
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                               <!-- <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>-->
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-user btn-block" style="background-color: #2B0082; color:#ffffff" >
                                           Iniciar Sesión
                                        </button>
                                     
                                      
                                    </form>
                                    <hr>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="Util/vendor/jquery/jquery.min.js"></script>
    <script src="Util/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="Util/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="Util/Js/sb-admin-2.min.js"></script>
     <script src="Util/Js/sweetalert2.all.min.js"></script>    

    <script src="Util/Js/boostrap.min.js"></script>
    <script src="codigo.js"></script>    

</body>

</html>