<style type="text/css">
.countdown {
            width: 25px; height: 10px;
          
            font-size: 1.4em;
     
            
            /* Centering everything */
            position: absolute;
            left: 50%; top: 60%;
            margin-left: -125px; margin-top: -50px;
            padding-left: 88px;

            text-align: left;
        }
</style>
<script type="text/javascript">
   
const maxMin = 9;
const maxSec = 59;

var min = maxMin;
var sec = maxSec;
var idleInterval;
window.onload = startTimer;

function startTimer() {
    
    //Increment the idle time counter every minute.
    idleInterval = setInterval(timerIncrement, 1000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        min = maxMin;
        sec = maxSec;
    });
    $(this).keypress(function (e) {
        min = maxMin;
        sec = maxSec;
    });
}

function timerIncrement() {
    var timeOver = false;

    if (sec > 0) 
        {
            sec = sec -1;
        }
    else
        {
            if (min > 0) 
            {
                min = min -1;
                sec = maxSec;
            }
            else
            {
                timeOver = true;
            }
        }
    
    var sec2;
    if (sec < 10) sec2 = "0" + sec;
    else sec2 = sec;
    $('.countdown').text(min + ':' + sec2);
    if (timeOver) { 
 clearInterval(idleInterval);
       
        //window.location.reload();
        Swal.fire({
  title: 'Tu sesión ha expirado',
  text: "por inactividad de 10 minutos",
  icon: 'warning',
 
});
   setTimeout(() => {  window.location = '../logout.php'; }, 3000);
                    
    }
}



</script>

<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2B0082;">


<!-- Sidebar - Brand -->    <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                   
            <div class="sidebar-brand-icon" >
                   
                
                    <!-- <div class="sidebar-brand-text mx-3">Agencia Aduanal Alfonso Bres</div>-->


                    <img class="img-profile rounded-circle" src="<?php echo  $_SESSION["avatar"]; ?>" style="height:80px; width:80px;">
                </div>
            </a>
            <br>
            <hr class="sidebar-divider my-0">
            <!-- Sidebar - Brand -->
            <li class="nav-item" style="text-align:center;">
                <a class="nav-link" href="#">
            <!-- <i class="fas fa-file-archive"></i>-->
                    <span value=""><?php echo  $_SESSION["s_usuario"]; ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php
                if ($_SESSION["admin"]=="1") 
                    { 
                        echo '<li class="nav-item" >
                        <a class="nav-link"  href="http://localhost/agestor1%20-%20copia%20-%20copia/ManualdeUsuario/ManualdeUsuario.pdf" download="ManualdeUsuario.pdf">
                            <i class="fas fa-file-pdf"></i>
                            <span>Manual de Usuario</span></a>
                    </li>
                <li class="nav-item" >
                                    <a class="nav-link" style="color: #ffffff;" href="inicio.php">
                                        <i class="fas fa-fw fa-tachometer-alt"></i>
                                        <span>Dashboard</span></a>
                                </li>';
                    }
             ?>

            <li class="nav-item" >
                <a class="nav-link" href="../Views/miperfil.php">
                    <i class="fas fa-address-card" ></i>
                    <span>Mi perfil</span></a>
            </li>

            <hr class="sidebar-divider">
                <div class="sidebar-heading" style="color: #ffffff;">
                    Tiempo de Inactividad
                </div><br><br>

            <li class="nav-item">
               
                    <i class="far fa-clock countdown" style="line-height: 60px;  font-size: 1.15em; color: #FFFFFF;"></i>
                 
            </li>
     
                          
          

          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: #ffffff;">
                NAVEGACIÓN
            </div>

          


            <?php 
                if ($_SESSION["admin"]=="1") 
                {
                    
                      echo'<li class="nav-item">
                                <a class="nav-link" href="../Views/usuario.php">
                                    <i class="fas fa-users"></i>
                                    <span>Empleados</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../Views/usuario2.php">
                                <i class="fas fa-users-slash"></i>
                                    <span>Empleados dados de Baja</span></a>
                            </li>
                            

                            <li class="nav-item">
                                <a class="nav-link" href="../Views/departamentos.php">
                                <i class="fas fa-wallet"></i>
                                    <span>Departamentos</span></a>
                            </li>'; 
                }
         ?>

         

   
            <li class="nav-item">
                <a class="nav-link" href="../Views/files.php?page=files">
                    <i class="fas fa-folder"></i>
                    <span>Carpetas</span></a>
            </li>

          
            <?php 
                if ($_SESSION["admin"]=="1") 
                {
                echo' <li class="nav-item">
                                <a class="nav-link" href="papelera.php">
                                    <i class="fas fa-trash"></i>
                                    <span>Papelera</span></a>
                            </li>';
                }
             ?>   


            <li class="nav-item">
                <a class="nav-link" href="autor.php">
                <i class="fas fa-info-circle"></i>
                    <span>Acerca del autor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

<!-- <script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script> -->