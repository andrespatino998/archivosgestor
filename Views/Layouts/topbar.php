<?php  


echo '<script src="../Util/Js/sweetalert2.min.js"></script>';
 $obj = new BD_PDO();

                
if(isset($_POST['btniniciar']))
                {


                   $sqlqry = "UPDATE usuarios SET contrasena = md5('".$_POST['txtcontran'] ."')".' WHERE' ." id =".$_SESSION['id']."";
                  // echo $sqlqry;
                  $info=$obj->Ejecutar_Instruccion($sqlqry);
                    echo"<script> 
                    Swal.fire({
                    icon: 'success',
                    title: 'Exito.',
                    text: 'Contraseña cambiada!',
                     });
                    </script>";
                    echo "<script>setTimeout(() => { window.location = '../logout.php'; }, 3000);</script>";
               }

            date_default_timezone_set('America/Mexico_City');

            function fechaMexico(){
            $mes = array("","Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre");
            return date('d')." de ". $mes[date('n')] . " de " . date('Y');
        }

?>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="input-group " style="align-items: flex-end;">
  
						<h6 style="font-size:20px;">Sistema para el Manejo y Control de Archivos Administrativos</h6>
						<h6 class="ml-auto"  style="font-size:17px;"><strong>Piedras Negras, Coahuila, </strong><?php echo fechaMexico(); ?></h6>
                  
    
    </div>
<!-- Topbar Search -->

    <script type="text/javascript">


    function cerrarsesion(){


        Swal.fire({
    title: 'Tu sesión ha expirado',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonText: "Salir",
    cancelButtonColor: '#d33',
    confirmButtonText: "Continuar Trabajando"
    }).then((result) => {
    if (!result.isConfirmed) {
        window.location = "../logout.php";
    }
    })


    }

    function Validar()
            {

                
                <?php $element = json_encode($_SESSION['contrasena']); ?>
                var other = <?php echo $element; ?>;

                var txtcontra = document.getElementById("txtcontra").value;
                var txtcontran = document.getElementById("txtcontran").value;
                var txtcontran2 = document.getElementById("txtcontran2").value;
                        
                            
                if (txtcontra==="" || txtcontran===""|| txtcontran2==="")
                {
                toastr.error('Todos los campos son obligatorios')
                    return false; 
                }
                if (txtcontran!==txtcontran2)
                {
                toastr.error('Las contraseñas no coinciden ')
                    return false; 
                }

                if (txtcontran!==txtcontran2)
                {
                toastr.error('Las contraseñas no coinciden ')
                    return false; 
                }
                if (txtcontra!==other)
                {
                toastr.error('La contraseña actual es incorrecta ')
                    return false; 
                }
                if (txtcontran.length < 6){
                    toastr.error('La contraseña no puede ser menor de 6 caracteres')
                        return false;
                    }
                    if (txtcontran.length > 15){
                    toastr.error('La contraseña no puede ser mayor de 15 caracteres')
                        return false;
                    }

            }

    function mostrarPassword(){
            var cambio = document.getElementById("txtcontra");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }

            
        

        } 
        function mostrarPassword1(){
            var cambio = document.getElementById("txtcontran");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        

        } 
        function mostrarPassword2(){
            var cambio = document.getElementById("txtcontran2");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon3').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon3').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        

        } 
        

        function validateFileType(){
            var fileName = document.getElementById("file-ip-1").value;
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
                //TO DO
            }else{
                Swal.fire({
                icon: 'error',
                title: 'Solo se permiten imagenes',
            })
            setTimeout(() => {  location.reload(); }, 2000);
            }   
        } 
    </script>
<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">






    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo utf8_encode($_SESSION["nombre"]);?></span>
            <img class="img-profile rounded-circle"
                src="<?php echo $_SESSION["avatar"];?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="" data-toggle="modal" id="btnFoto"  data-target="#modalPerfil">
                <i class="far fa-image fa-sm fa-fw mr-2 text-gray-400"></i>
                Foto de perfil
            </a>
           
      
            <a type="" class="dropdown-item" href="cambiar.php" data-toggle="modal" data-target="#exampleModal">
   <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                Cambiar Contraseña
</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal" onclick="cerrarsesion();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Cerrar Sesión
            </a>
        </div>
    </li>
</ul>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#2B0082; color: white;">
       <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" style="color: #ffffff;">&times;</span>
       </button>
     </div>
     <div class="modal-body">
        <form id="cam" action="inicio.php" method="post" onsubmit="return Validar()">
                                            
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Contraseña Actual</label>
                                            <div class="input-group">
                                                 <input  id="txtcontra" name="txtcontra" type="password" class="form-control" required>
                                                  <div class="input-group-append">
                                                      <button  class="btn" style="background-color:#2B0082;"  type="button"  onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon1" style="color: #ffffff"></span> </button>
                                                  </div>
                                            </div>
                                      </div>

                                        
                                       <div class="form-group">
                                            <label for="" class="col-form-label">Contraseña Nueva</label>
                                                <div class="input-group">
                                                    <input  id="txtcontran" name="txtcontran" type="Password" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <button  class="btn" style="background-color:#2B0082;" type="button"  onclick="mostrarPassword1()"> <span class="fa fa-eye-slash icon2" style="color: #ffffff"></span> </button>
                                                    </div>
                                             </div>
                                        </div>
                                      
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Confirmar Contraseña Nueva</label>
                                            <div class="input-group">
                                              <input  id="txtcontran2" name="txtcontran2" type="Password" class="form-control" required>
                                                <div class="input-group-append">
                                                      <button  class="btn" style="background-color:#2B0082;" type="button"  onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon3" style="color: #ffffff"></span> </button>
                                                </div>
                                            </div>
                                    </div>
                         
                                           
                                   
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-dark" id="btniniciar" name="btniniciar" >Aceptar</button></form>
     </div>
   </div>
 </div>
</div>


</nav>



<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2B0082; color: white; ">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff;">&times;</span>
                </button>
            </div>
        <form id="formUsuarioPerfil" enctype="multipart/form-data" method="post">    
            <div class="modal-body">
                <div class="row" hidden >
                    <div class="col-lg-12" >
                        <div class="form-group"> 
                            <label for="nombre" class="col-form-label">ID</label>
                            <input type="text" class="form-control"  id="txtid" name="txtid"  value="<?php echo  $_SESSION["id"]; ?>">
                        
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="center">
                                <div class="form-input " >
                                    <label for="file-ip-1" >Elegir Imagen</label>
                                    <input type="file" class="form-control"  style="width:100%" id="file-ip-1"  accept="image/*"  name="avatar" onchange="showPreview(event), validateFileType()"  >
                                        <div class="preview"> 
                                        <img id="file-ip-1-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                <input type="submit" id="btninsertar" name="btninsertar" class="btn btn-dark" value="Modificar" >
            </div>
        </form>    
    </div>
    </div>
</div>  

