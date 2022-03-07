<?php 
 session_start();
require "adm-consultas.php";
?>



<?php 
    foreach($usuario as $mostrar){ ?>
        <div class="contacto">
            <div class="imagen">
                <img src="<?php echo $mostrar['avatar'];?>" alt="">
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